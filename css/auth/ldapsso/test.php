<?php  // $Id: test.php  2009-11-10 22:01:00 viperf117a Exp $

    /* We want to be as verbose as possible here - Debug Only. */
    error_reporting(E_ALL);

    require_once("../../config.php");
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->libdir.'/moodlelib.php');      // Must handle Parameters
    require_once($CFG->libdir.'/deprecatedlib.php');  // supports print_simple_box method
    require_once($CFG->libdir.'/dmllib.php');          // Database Connectivity

    global $CFG;

    $sitecontext = get_context_instance(CONTEXT_SYSTEM);

    /// Define variables used in page
    if (!$site = get_site()) {
        error("No site found!");
    }
      // Be sure to uncomment after concluding tests!
    /* require_login();

     if (!has_capability('moodle/user:update', $sitecontext) and !has_capability('moodle/user:delete', $sitecontext)) {
        error('You do not have the required permission to manage users.');
    }
    */

    if (empty($CFG->loginhttps)) {
        $CFG->httpswwwroot = $CFG->wwwroot;
    } else {
        $CFG->httpswwwroot = str_replace('http:','https:',$CFG->wwwroot);
    }

   
    $loginsite = get_string("loginsite");
    $navlinks = array(array('name' => $loginsite, 'link' => null, 'type' => 'misc'));
    $navigation = build_navigation($navlinks);
    $focus="userId";
    
    if (empty($CFG->langmenu)) {
        $langmenu = "";
    } else {
        $currlang = current_language();
        $langs    = get_list_of_languages();
        $langlabel = get_accesshide(get_string('language'));
        $langmenu = popup_form ("$CFG->httpswwwroot/login/index.php?lang=", $langs, "chooselang", $currlang, "", "", "", true, 'self', $langlabel);
    }


   print_header("$site->fullname: $loginsite", $site->fullname, $navigation, $focus,
                 '', true, '<div class="langmenu">'.$langmenu.'</div>');
                 
     // Is extension php-ldap and ldap support enabled ?
   if (!extension_loaded('ldap') || !function_exists('ldap_connect')) {
     notify(get_string('auth_ldap_noextension','auth'));
   }else{  // Display the login test form

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="2" width="100%" align='center'>
     <h2>Portal LDAP URL SSO Test</h2>
    <form id="LDAPSSO_LOGIN" action="index.php" method="post" id='login' >
    <input type="HIDDEN" name="key" value="94aebcc6fa3b4f2a2155419d97b632f1" /> <!-- ldapsso_auth_key from LDAP URL SSO Config -->
      <div align="center">
           <p>Please Enter login credentials : </p>
              <p style='margin-left: 1px;'>User ID:&nbsp;<input type="TEXT" name ="username" value="viperf117a" SIZE=10/></p>
              <p style='margin-right: 15px;'>Password:&nbsp;&nbsp;<input type="PASSWORD" name="passwd" value="" SIZE=12/></p>
              <P>First Name:&nbsp;<input type="TEXT" name="firstName" value="" SIZE=15/></p>
              <p>Last Name:&nbsp;<input type="TEXT" name="lastName" value="" SIZE=15/></p>
              <p style='margin-left: 42px;'>Email:&nbsp;<input type="TEXT" name ="email" value="" SIZE=15/></p>
              <p>Institution:&nbsp;<input type="TEXT" name ="institution" value="MySchool" SIZE=15/></p>
              <input name="submit" type= submit title="submit" value="Send Login info">
       </div>
    </form>
   </td>
  </tr>
  <tr>
    <td width="100%" height="43px" align="center" valign="top" scope="row">
     &nbsp;
    </td>
  </tr>
 </table>
<?php } print_footer(); ?>

