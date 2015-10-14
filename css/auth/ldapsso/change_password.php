<?PHP // $Id: change_password.php,v 1.63.1.1 2009-11-23 04:22:02 viperf117a Exp $

    require_once('../../config.php');
    require_once('change_password_form.php');

    $id = optional_param('id', SITEID, PARAM_INT); // current course

    $strparticipants = get_string('participants');

    //HTTPS is potentially required in this page
    httpsrequired();

    $systemcontext = get_context_instance(CONTEXT_SYSTEM);

    if (!$course = get_record('course', 'id', $id)) {
        error('No such course!');
    }

    // require proper login; guest user can not change password
    if (empty($USER->id) or isguestuser()) {
        if (empty($SESSION->wantsurl)) {
            $SESSION->wantsurl = $CFG->httpswwwroot.'/login/change_password.php';
        }
        redirect($CFG->httpswwwroot.'/login/index.php');
    }

    // do not require change own password cap if change forced
    if (!get_user_preferences('auth_forcepasswordchange', false)) {
        require_capability('moodle/user:changeownpassword', $systemcontext);
    }

    // do not allow "Logged in as" users to change any passwords
    if (!empty($USER->realuser)) {
        error('Can not use this script when "Logged in as"!');
    }


    // load the appropriate auth plugin
    $userauth = get_auth_plugin($USER->auth);

    if (!$userauth->can_change_password()) {
        print_error('nopasswordchange', 'auth_ldapsso');
    }


    $mform = new login_change_password_form();
    $mform->set_data(array('id'=>$course->id));

    $navlinks = array();
    $navlinks[] = array('name' => $strparticipants, 'link' => "$CFG->httpswwwroot/user/index.php?id=$course->id", 'type' => 'misc');

    if ($mform->is_cancelled()) {
        redirect($CFG->httpswwwroot.'/user/view.php?id='.$USER->id.'&amp;course='.$course->id);
    } else if ($data = $mform->get_data()) {

        if (!$userauth->user_update_password(addslashes_recursive($USER), $data->newpassword1)) {
            print_error('errorpasswordupdate', 'auth');
        }

        // register success changing password
        unset_user_preference('auth_forcepasswordchange', $USER->id);

        $strpasswordchanged = get_string('passwordchanged', 'auth_ldapsso');

        // MDL-9983
        $eventdata = new object();
        $eventdata -> user = $USER;
        $eventdata -> newpassword = $data -> newpassword1;
        events_trigger('password_changed', $eventdata);

        add_to_log($course->id, 'user', 'change password', "view.php?id=$USER->id&amp;course=$course->id", "$USER->id");

        $fullname = fullname($USER, true);

        $navlinks[] = array('name' => $fullname,
                            'link' => "$CFG->httpswwwroot/user/view.php?id=$USER->id&amp;course=$course->id",
                            'type' => 'misc');
        $navlinks[] = array('name' => $strpasswordchanged, 'link' => null, 'type' => 'misc');
        $navigation = build_navigation($navlinks);

        print_header($strpasswordchanged, $strpasswordchanged, $navigation);

        if (empty($SESSION->wantsurl) or $SESSION->wantsurl == $CFG->httpswwwroot.'/login/change_password.php') {
            $returnto = "$CFG->httpswwwroot/user/view.php?id=$USER->id&amp;course=$id";
        } else {
            $returnto = $SESSION->wantsurl;
        }

        notice($strpasswordchanged, $returnto);

        print_footer();
        exit;
    }


    $strchangepassword = get_string('changepassword','auth_ldapsso');

    $fullname = fullname($USER, true);

    $navlinks[] = array('name' => $fullname, 'link' => "$CFG->httpswwwroot/user/view.php?id=$USER->id&amp;course=$course->id", 'type' => 'misc');
    $navlinks[] = array('name' => $strchangepassword, 'link' => null, 'type' => 'misc');
    $navigation = build_navigation($navlinks);

    print_header($strchangepassword, $strchangepassword, $navigation);
    if (get_user_preferences('auth_forcepasswordchange')) {
        notify(get_string('forcepasswordchangenotice'));
    }
    $mform->display();
    print_footer();

?>
