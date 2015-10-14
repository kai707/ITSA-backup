<?php  // $Id: lib_ldapsso.php  2009-11-10 21:03:00 viperf117a Exp $
/**
 * @author John T. Macklin (viperf117a@yahoo.com)
 * @version $Id: lib_ldapsso.php,v 1.0 2009/11/11 19:23:07 viperf117a Exp $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package moodleauth  -   Custom LDAP URL SSO PHP Functions
*/
      function confirm_user($user){  // Complete the login process

            global $CFG, $SESSION; 

            if ($user) {
                  // language setup
               update_login_count();

            if ($user->username == 'guest') {
                // no predefined language for guests - use existing session or default site lang
                unset($user->lang);

            } else if (!empty($user->lang)) {
                // unset previous session language - use user preference instead
                unset($SESSION->lang);
            }

            if (empty($user->confirmed)) {  // This account was never confirmed
                $CFG->registerauth='ldapsso';       // User ldapsso to verify registration
                $user->secret=md5(rand(1,9876543)); // Set secret for confirmation
                send_confirmation_email($user);     // Genetrate Confirmation Email!
                print_heading(get_string("mustconfirm"));
                print_box_start('generalbox centerpara boxwidthnormal boxaligncenter');
                echo "<h2>".get_string('confirmednot')."</h2>\n";
                echo "<p>".get_string('auth_ldap_sso_confirmednot','auth_ldapsso')."</p>\n";
                print_single_button("$CFG->wwwroot/login/", null, get_string('continue'));
                print_box_end();
                print_footer();
                exit;
            }

             $USER = complete_user_login($user);

           /// Let's set them up.
            add_to_log(SITEID, 'user', 'login', "view.php?id=$USER->id&course=".SITEID,
                       $user->id, 0, $user->id);

        /// Prepare redirection
            if (user_not_fully_set_up($USER)) {
                $urltogo = $CFG->wwwroot.'/user/edit.php';
                // We don't delete $SESSION->wantsurl yet, so we get there later

            } else if (isset($SESSION->wantsurl) and (strpos($SESSION->wantsurl, $CFG->wwwroot) === 0)) {
                $urltogo = $SESSION->wantsurl;    /// Because it's an address in this site
                unset($SESSION->wantsurl);

            } else {
                // no wantsurl stored or external - go to homepage
                $urltogo = $CFG->wwwroot.'/';
                unset($SESSION->wantsurl);
            }

        /// Go to my-moodle page instead of homepage if mymoodleredirect enabled
            if (!has_capability('moodle/site:config',get_context_instance(CONTEXT_SYSTEM)) and !empty($CFG->mymoodleredirect) and !isguest()) {
                if ($urltogo == $CFG->wwwroot or $urltogo == $CFG->wwwroot.'/' or $urltogo == $CFG->wwwroot.'/index.php') {
                    $urltogo = $CFG->wwwroot.'/my/';
                }
            }


        /// check if user password has expired
        /// Currently supported only for ldap-authentication module
            $userauth = get_auth_plugin($USER->auth);
            if (!empty($userauth->config->expiration) and $userauth->config->expiration == 1) {
                if ($userauth->can_change_password()) {
                    $passwordchangeurl = $userauth->change_password_url();
                } else {
                    $passwordchangeurl = $CFG->httpswwwroot.'/login/change_password.php';
                }
                $days2expire = $userauth->password_expire($USER->username);
                if (intval($days2expire) > 0 && intval($days2expire) < intval($userauth->config->expiration_warning)) {
                    print_header("$site->fullname: $loginsite", "$site->fullname", $navigation, '', '', true, "<div class=\"langmenu\">$langmenu</div>");
                    notice_yesno(get_string('auth_passwordwillexpire', 'auth', $days2expire), $passwordchangeurl, $urltogo);
                    print_footer();
                    exit;
                } elseif (intval($days2expire) < 0 ) {
                    print_header("$site->fullname: $loginsite", "$site->fullname", $navigation, '', '', true, "<div class=\"langmenu\">$langmenu</div>");
                    notice_yesno(get_string('auth_passwordisexpired', 'auth'), $passwordchangeurl, $urltogo);
                    print_footer();
                    exit;
                }
            }
            
          // Do necessary user updates for 'onlogin' Data Mappings 
          // narrow down what fields we need to update
            $all_keys = array_keys(get_object_vars($userauth->config));
            $updatekeys = array();
            // $updatekeys = array('firstname','lastname','idnumber','city','country','description');
            foreach ($all_keys as $key) {
                if (preg_match('/^field_updatelocal_(.+)$/',$key, $match)) {
                    // if we have a field to update and it is set as 'onlogin'
                    if ( !empty($userauth->config->{'field_map_'.$match[1]})
                         and $userauth->config->{$match[0]} === 'onlogin') {
                        array_push($updatekeys, $match[1]); // the actual key name
                    }
                }
            }
            // print_r($all_keys); print_r($updatekeys);
            unset($all_keys); unset($key);
            if(!empty($updatekeys))
              $userauth->update_user_record(addslashes($user->username), $updatekeys);


            reset_login_count();
            
            // Return to original debugging level
            $CFG->debug = $origdebug;
             error_reporting($CFG->debug);

            redirect($urltogo,'Redirecting login request!',0);

          }

        }
         /* Checks for user data and logs them in automatically
         * if the authentication is successful, it returns a
         * valid $user object from the 'user' table.
         */
        function check_user_secret($username,$passwd){
          $user = get_complete_user_data('username', $username);

           if (is_object($user)) {
                //  try to login this user ...
                if(!empty($passwd)){
                  return authenticate_user_login($username,$passwd); // returns $USER object on success
                }
           }

         return false;
       }


 ?>
