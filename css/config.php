<?php  /// Moodle Configuration File 

unset($CFG);
define('STDOUT', "/var/log/apache2/css/error_log"); 

$CFG->dbtype    = 'mysql';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'css';
$CFG->dbuser    = 'css-pg';
$CFG->dbpass    = 'css@itsa';
$CFG->dbpersist =  false;
$CFG->prefix    = 'mdl_';

$CFG->wwwroot   = 'http://css.itsa.org.tw';
$CFG->dirroot   = '/home/ITSA/www/css';
$CFG->dataroot  = '/home/ITSA/moodledata-home/moodledata-css';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode

require_once("$CFG->dirroot/lib/setup.php");
// MAKE SURE WHEN YOU EDIT THIS FILE THAT THERE ARE NO SPACES, BLANK LINES,
// RETURNS, OR ANYTHING ELSE AFTER THE TWO CHARACTERS ON THE NEXT LINE.
?>
