<?php
/** auth_ldapsso_sync_users.php
 *
 * This script is meant to be called from a cronjob to sync moodle with the LDAP
 * backend in those setups where the LDAP backend acts as 'master'.
 *
 * Recommended cron entry:
 * # 5 minutes past 4am
 * 5 4 * * * /usr/bin/php -c /etc/php4/cli/php.ini /var/www/moodle/auth/ntlm/auth_ldap_sync_users.php
 *
 * Notes:
 *   - If you have a large number of users, you may want to raise the memory limits
 *     by passing -d momory_limit=256M
 *   - For debugging & better logging, you are encouraged to use in the command line:
 *     -d log_errors=1 -d error_reporting=E_ALL -d display_errors=0 -d html_errors=0
 *
 * Performance notes:
 * We have optimized it as best as we could for Postgres and mySQL, with 27K students
 * we have seen this take 10 minutes.
 *
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php'); // global moodle config file.
require_once($CFG->libdir.'/blocklib.php');
require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/mod/resource/lib.php');
require_once($CFG->dirroot.'/mod/forum/lib.php');

if (isset($_SERVER['REMOTE_ADDR'])) {
    error_log("should not be called from web server!");
    exit;
}

$nomoodlecookie = true; // cookie not needed

if (!is_enabled_auth('ldapsso')) {
    echo "LDAP SSO Plugin not enabled!";
    die;
}

$ldapauth = get_auth_plugin('ldapsso');
$ldapauth->sync_users(1000, true);

?>