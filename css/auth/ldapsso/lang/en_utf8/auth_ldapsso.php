<?PHP
/**
 *
 * @author John T. Macklin (viperf117a@yahoo.com)
 * @version $Id: auth_ldapsso.php,v 1.0 2009/11/11 18:11:07 viperf117a Exp $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package moodleauth
*/


$string['auth_ldapssotitle'] = 'LDAP URL SSO';
$string['auth_ldapssodescription']= 'Remote URL LDAP Single Sign On';
$string['auth_ldapsso_randsalt'] = 'URL Random SALT';
$string['auth_user_create_internal'] = "Create Users Iternally when missing local account";
$string['auth_user_create_error'] = "Could not create new Ext entry for user";
$string['auth_user_login_verify_error'] = "Could not verify user supplied credentials";
$string['auth_ldapsso_auth_user_create_key'] = 'Create LDAP Users Internally';
$string['auth_ldapsso_server_settings'] = 'LDAP SSO Remote Server IP Address Settings';
$string['auth_ldapsso_portal'] = 'FQDN of Portal - eg portal.mydomain.edu';
$string['auth_ldapsso_user_creation'] = 'Existing LDAP users creates a new local 
                                         account upon login <BR> If Set to \'No\' users will be redirected 
                                         to failed login URL.';
$string['auth_ldapsso_ipcheck'] = 'IP Address Check';
$string['auth_ldapsso_saltcheck'] = 'SALT Check';
$string['auth_ldapsso_failed_logins'] = 'Redirect LDAP SSO Failed Login URL';
$string['auth_ldapsso_failed_login_url']= 'Redirect URL eg - http://my.portal.com';

$string['auth_ldap_sso_dbreviveuser'] = 'Revived user $a[0] id $a[1]';
$string['auth_ldap_sso_dbreviveusererror'] = 'Error reviving user $a';

$string['changepassword'] = 'LDAP SSO Change Password';
$string['nopasswordchange'] = 'Change Password feature disabled!';
$string['passwordchanged'] = 'LDAP SSO Password was changed!';

$string['auth_ldap_sso_confirmednot'] = 'This account requires email verification please check email';


?>
