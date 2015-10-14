<?php // $Id: index.php  2009-11-10 22:01:00 viperf117a Exp $
  //////////////////////////////////////////////////////////////
  /*
       Moodle Remote URL Single Sign On (SSO)
       Auth: John T. Macklin Remote Learner (C) 2008-2009
       Date: 7/21/2008 5:20:11 PM
       Rev:

       Notes:  Recommended Login form format for URL SSO
       Params: ?username=johndoe1&passwd=pass123&firstName=John&lastName=Macklin&institution=MySchool&key=sdRYx23xcvFx72xJ

          <form id="SSOLOGIN"
          action="https://moodle.mydomain.edu/auth/ldapsso/index.php"
          method="post" id="login">
           <div align="center">
              <p class="SSOLoginText">Please login to take your BECC Exams. </p>
            <p>
              <input type="HIDDEN" name ="username" value="KMT\65" />
              <input type="PASSWORD" name="passwd" value="pass123" SIZE=15/>
              <input type="TEXT" name="firstName" value="" SIZE=35/>
              <input type="TEXT" name="lastName" value="" SIZE=35/>
              <input type="TEXT" name ="email" value="" SIZE=15/>
              <input type="HIDDEN" name ="institution" value="MySchool" />
              <input type="HIDDEN" name="key" value="sdRYx23xcvFx72xJ" />
              <input name="submit" type= submit class="blueButton" title="submit" value="Login">
            </p>
          </div>
        </form>

    */
   /////////////////////////////////////////////////////////////////
   
    require_once("../../config.php");
    require_once("lib_ldapsso.php");
    require_once($CFG->libdir."/moodlelib.php");        // Must handle Parameters
    require_once($CFG->libdir."/dmllib.php");           // Database Connectivity
    require_once($CFG->libdir."/deprecatedlib.php");    // supports print_simple_box method
    require_once("../../user/profile/lib.php");        // manage new profile settings
    require_once($CFG->libdir."/setuplib.php");        // $USER Objects defined

    $userId  = required_param('username',PARAM_RAW);                    // Portal User UserID
    $passwd = required_param('passwd',PARAM_RAW);                       // User Password if supplied
    $key = required_param('key',PARAM_ALPHANUM);                        // Domain Portal Key
    $firstName  = optional_param('firstName',0,PARAM_ALPHA);            // Portal User firstName
    $lastName =  optional_param('lastName',0,PARAM_ALPHA);              // Portal User lastName
    $email =  optional_param('email',0,PARAM_RAW);                      // Portal User email
    $institution = optional_param('institution',0,PARAM_ALPHA);         // Portal User Institution
    $changeme = optional_param('forcepasswordchange',0,PARAM_BOOL);     // force user password change on first login

     // Set Debugging Mode
        $origdebug = $CFG->debug;
        $CFG->debug = DEBUG_ALL; // DEBUG_ALL;
        error_reporting($CFG->debug); // Debug All Errors Only

      //initialize variables
       $errormsg = '';
       $errorcode = 4;
       $frm  = false;
       $user = false;

       $loginTime = time();

    if (empty($CFG->loginhttps)) {
        $CFG->httpswwwroot = $CFG->wwwroot;
    } else {
        $CFG->httpswwwroot = str_replace('http:','https:',$CFG->wwwroot);
    }

    /// Define variables used in page
    $loginsite = get_string("loginsite");
    $navlinks = array(array('name' => $loginsite, 'link' => null, 'type' => 'misc'));
    $navigation = build_navigation($navlinks);
    
    if (!$site = get_site()) {
        error("No site found!");
     }

    $authplugin=get_auth_plugin('ldapsso');
     // If not a valid Page Request from Portal Server redirect user to main login page ...
    if(!$authplugin->loginpage_hook($key))
       redirect($authplugin->config->ldapsso_failed_login_url, 'Invalid Server Credentials!', 4);
    
    //HTTPS is potentially required in this page
     httpsrequired();

    if (empty($CFG->langmenu)) {
        $langmenu = "";
    } else {
        $currlang = current_language();
        $langs    = get_list_of_languages();
        $langlabel = get_accesshide(get_string('language'));
        $langmenu = popup_form ("$CFG->httpswwwroot/login/index.php?lang=", $langs, "chooselang", $currlang, "", "", "", true, 'self', $langlabel);
    }

    $focus="userId";
    print_header("$site->fullname: $loginsite", $site->fullname, $navigation, $focus,
                 '', true, '<div class="langmenu">'.$langmenu.'</div>');

    // Process user login post
    if (is_enabled_auth('none') && empty($CFG->extendedusernamechars)) {
            $string = eregi_replace("[^(-\.[:alnum:])]", "",  $userId);
            if (strcmp($userId, $string)) {
                $errormsg = get_string('username').': '.get_string("alphanumerical");
                error("$errormsg");
            }
     }

   $userId=trim(moodle_strtolower($userId));          // enforce lowercase logins
   
      // Decide if this userId already exists
    if (record_exists('user', 'username', $userId)) {  // UserId is in user table
          $user = check_user_secret(addslashes($userId),addslashes($passwd));  // returns $USER object on success
           if($user){  // user exists in mdl_user table
                  if(isset($changeme) && $changeme){ // Make em set a new password on inital login.
                      set_user_preference('auth_forcepasswordchange', true, $user->id);
                   }
                 confirm_user($user); // comfirms registration and redirects to page with session
            }

    }else{ // user does not exist lets create them if auth plugin permits and user exists in LDAP
         if (!$authplugin->can_create_account()) {
            error_log("Current LDAP URL SSO plugin settings does not allow user creation.");
            redirect($authplugin->config->ldapsso_failed_login_url, 'Create LDAP Users Internally not enabled!', 2);
          }

          // Test Existing LDAP User Credentials
         if($authplugin->user_exists($userId) && !$authplugin->user_login($userId,$passwd)){
          error_log("LDAP URL SSO Login failed for user: $userId");
          add_to_log($site->id, 'user', 'login', "$CFG->httpswwwroot/auth/ldapsso/index.php", "LDAP Login failed: $userId");
          redirect($authplugin->config->ldapsso_failed_login_url);
         }
        
        $user_info_ldap  = $authplugin->get_userinfo_asobj($userId);
        $attribs_map = $authplugin->ldap_attributes(); 

        $user = new object();
        $user->confirmed   = 0; // Must confirm new users via email or LDAP Server
        $user->lang        = current_language();
        $user->firstaccess = time();
        $user->mnethostid  = $CFG->mnet_localhost_id;
        $user->auth        = "ldapsso";
        $user->username    = $userId;
        if(!$authplugin->config->preventpassindb)
        $user->password    = $passwd;
        empty($user_info_ldap->{$attribs_map[lang]}) ? $user->lang = current_language() : $user->lang = $user_info_ldap->{$attribs_map[lang]};

           // Update with Optional Field Mappings if any

          if(!empty($user_info_ldap->{$attribs_map[idnumber]})) // Idnumber Field
              $user->idnumber = $user_info_ldap->{$attribs_map[idnumber]};

          if(isset($email) && 
            filter_var($email, FILTER_VALIDATE_EMAIL))// Email Field
          {
             $user->email = $email;
          }else{
            if(!empty($user_info_ldap->{$attribs_map[email]}))
              $user->email = $user_info_ldap->{$attribs_map[email]};
          }

          if(isset($firstName) && $firstName){ // First Name Field
            $user->firstname   = $firstName;
          }else{ // Update from LDAP Directory
            if(!empty($user_info_ldap->{$attribs_map[firstname]}))
              $user->firstname = $user_info_ldap->{$attribs_map[firstname]};
          }

          if(isset($lastName) && $lastName)   // Last Name Field
          {
             $user->lastname   = $lastName;
          }else{
             if(!empty($user_info_ldap->{$attribs_map[lastname]}))
              $user->lastname = $user_info_ldap->{$attribs_map[lastname]};
          }

         if(isset($institution) && $institution)  // Institution Field
         {
            $user->institution = $institution;
         }else{
              if(!empty($user_info_ldap->{$attribs_map[institution]}))
                $user->institution = $user_info_ldap->{$attribs_map[institution]};
         }

         if(!empty($user_info_ldap->{$attribs_map[city]})){     // City Field
              $user->city = $user_info_ldap->{$attribs_map[city]};
         }else{
              $user->city = '*';
         }

         if(!empty($user_info_ldap->{$attribs_map[country]})){  // Country Field
              $user->country = $user_info_ldap->{$attribs_map[country]};
         }else{
              $user->country = 'US';
         }

         if ($authplugin->can_signup()){ // Create New User in LDAP Ext Auth
            // New users are created in $authplugin->config->create_context
              if(!$authplugin->user_exists($userId) && !empty($user->email)) // User does not exist in LDAP Ext Auth - Email Required to create
                if(!$authplugin->user_create($user,$user->password)) {
                   error_log("LDAP URL SSO plugin could not create Ext Auth entry for user: ".$user->username);
                   print_error('auth_user_create_error','auth_ldapsso');
                }
          }

         if($authplugin->user_exists($user->username) && $authplugin->user_login($user->username,$user->password)){
               // Password Election and Verification
              if(isset($user->password) && $passwd) // Password Param included here
	         $user->password = hash_internal_user_password($user->password);


             if (! ($user->id = insert_record('user', $user)) ) { // Create a new user record for this user
                    error("Create new user account failed! Please contact the site administrator...");
               }

             if((isset($changeme) && $changeme || !empty($authplugin->config->forcechangepassword))){ // Make em set a new password on inital login.
                set_user_preference('auth_forcepasswordchange', true, $user->id);
             }

             // Log in now with a new profile
              $user = authenticate_user_login($user->username, $passwd); // returns $USER object on success

               if($user)  // user exists in mdl_user table
                  confirm_user($user); // comfirms registration and redirects to page with session

         }else{ // Somting went wrong with user creation!
             error_log("LDAP URL SSO plugin could not verify Ext Auth entry for user: ".$user->username);
             print_error('auth_user_login_verify_error','auth_ldapsso');
         }

    }


    print_simple_box("<p style='color: red; text-align: center;'>Invalid login, please try again!</p>");
    redirect($authplugin->config->ldapsso_failed_login_url, 'Login Error!', 2);

?>
