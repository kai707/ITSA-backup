<?php // $Id: failed_login.php  2009-11-09 21:01:00 viperf117a Exp $

  require_once('../../config.php');
 
  // if you are logged in then you shouldn't be here!
   if (isloggedin() and !isguestuser()) {
      redirect($CFG->wwwroot.'/index.php', get_string('loginalready'), 5);
   }

  // if alternatepasswordurl is defined, then we'll just head there
  if (!empty($CFG->forgottenpasswordurl)) {
      redirect($CFG->forgottenpasswordurl);
  }
  
  // setup text strings
  $strforgotten = get_string('passwordforgotten');
  $strlogin     = get_string('login');
  
  $navigation = build_navigation(array(array('name' => $strlogin, 'link' => "$CFG->wwwroot/login/index.php", 'type' => 'misc'),
                                     array('name' => $strforgotten, 'link' => null, 'type' => 'misc')));

  print_header($strforgotten, $strforgotten, $navigation);

  print_box(get_string('passwordnohelp'), 'generalbox boxwidthnormal boxaligncenter');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="2" width="100%" align='center'>
       <h2>LDAP URL SSO Login Failed!</h2>
    </td>
  </tr>
  <tr>
    <td width="100%" height="43px" align="center" valign="top" scope="row">
     &nbsp;
    </td>
  </tr>
 </table>
<?php  print_footer(); ?>