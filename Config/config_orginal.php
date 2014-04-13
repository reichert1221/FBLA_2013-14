<?php

###### Configuration File ######
###### Version: 0 ##########

	define('DS' , DIRECTORY_SEPARATOR, false); // Chooses a forward slash (for linux/unix) or back slash (for windows)
	define('PATH' , $_SERVER['DOCUMENT_ROOT'], false); // Change to your public folder (also will need to modify .htaccess)
	define('DEVELOPMENT_ENVIRONMENT', true); // Environment type, change 'true' to 'false' for a production environment
	define("NAME", "Flat UI 'Modern'"); // Place the name of your site here
	define("VERSION", "0"); // Sets the version of the software package for detection by addons
	define("SHOW_POSTS", 5); // Sets the maximum number of posts to load on the homepage. Set to "ALL" to show all
	/*
	 * Constant 'ACTIVE':
	 * value: true- normal functions, Control Screen available at http://<your site here>/control
	 * value: false- denial of service to everyone
	 * value: construction- denial of service to everyone (construction page), visit http://<your site here>/const/enter.php to view the Control Screen
	 */
	define("ACTIVE", true);

	ini_set('date.timezone', 'UTC'); // Set timezone

	if(!ACTIVE){
	 	die("This site is currently down. Sorry for the inconvenience.");
	 } elseif(ACTIVE === "construction") {
	 	require_once(PATH . DS . "Errors" . DS . "construction.html");
	 	die();
	 }

	/*
	 * Server type: DEVELOPMENT or PRODUCTION?
	 *
	 * DEVELOPMENT: PHP errors will show
	 *
	 * PRODUCTION: PHP errors will be logged in tmp/logs/error.log
	 */

	 if(DEVELOPMENT_ENVIRONMENT){
		error_reporting(E_ALL | E_STRICT);
		ini_set("display_errors", 'On');
		ini_set('log_errors', 'On');
		ini_set('error_log', PATH . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
	 } else {
		error_reporting(E_ALL | E_STRICT);
		ini_set('display_errors','Off');
		ini_set('log_errors', 'On');
		ini_set('error_log', PATH . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
	 }


	/*
	 * Database configuration
	 * Create a database on your server, we'll do the rest
	 *
	 * DBTYPE: Database type (driver) (mysql, postgresql, etc)
	 * DBHOST: DataBase host/location, i.e. localhost
	 * DBNAME: Database name
	 * DBUSER: A user with permissions for the database (insert, update, delete, etc)
	 * DBPASS: Password for the user
	 */
	define('DBTYPE', "mysql" );
	define('DBHOST', "localhost" );
	define('DBNAME', "Minimal");
	define('DBUSER', "root");
	define('DBPASS', "root");

	/*
	 * Password Hashing type
	 * Choose any hash that you like and is available on your server
	 * MD5 is not recommended, even with password salting and PBKDF2 as the hashing function
	 */
	 define('HASHTYPE', 'sha256');

	 /*
	  * For the Bootstap
	  * CONTROLLERPATH: path to the controllers
	  * MODELPATH: path to the models
	  * DEF_CONTROLLER: the default (home) controller (minus the extensions: home NOT home.controller.php)
	  * DEF_ERROR: the default error file (include path, error file MUST contain class name Error)
	  */
	  define('CONTROLLER_PATH', PATH . DS . 'controllers' . DS);
	  define('MODELPATH', PATH . DS . 'models' . DS);
	  define('DEF_CONTROLLER',  'home');
	  define('DEF_ERROR', CONTROLLER_PATH . 'error.controller.php');