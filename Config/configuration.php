<?php
	/**
		Guide for build number:
			YYMMMDD{BN} -- last two year digits - Month abbriviation - Day - Day's build number (A = 1st, B = 2nd, ...)
	  */

	/**
	  ********  Configuration File  ********
	  *
	  ********  Version: 1.0.1   ********
	  *
	  ******** Build: 13NOV26A   ********
	  *
  	  ******** Release Ready   ********
	  */

	define("VERSION", "1.0.1"); // DO NOT CHANGE
	define("BUILD", "13NOV26A", false);  // DO NOT CHANGE

	define('DS' , DIRECTORY_SEPARATOR, false); // Chooses a forward slash (for linux/unix) or back slash (for windows)
	define('PATH' , $_SERVER['DOCUMENT_ROOT'], false); // Change to your public folder (also will need to modify .htaccess)
	define('DEVELOPMENT_ENVIRONMENT', true); // Environment type, change 'true' to 'false' for a production environment
	define("NAME", "B&B Willow Lake"); // Place the name of your site here
	define("SHOW_POSTS", 5); // Sets the maximum number of posts to load on the homepage. Set to "ALL" to show all

	define("ACTIVE", true);
	define('HASHTYPE', 'sha256');

	define('DBTYPE', "mysql" );
	define('DBHOST', "localhost" );
	define('DBNAME', "");
	define('DBUSER', "");
	define('DBPASS', "");

	define('CONTROLLER_PATH', PATH . DS . 'controllers' . DS);
	define('MODELPATH', PATH . DS . 'models' . DS);
	define('DEF_CONTROLLER',  'home');
	define('DEF_ERROR', CONTROLLER_PATH . 'error.controller.php');

	ini_set('date.timezone', 'UTC'); // Set timezone

	if(!ACTIVE){
	 	die("This site is currently down. Sorry for the inconvenience.");
	 } elseif(ACTIVE === "construction") {
	 	require_once(PATH . DS . "Errors" . DS . "construction.html");
	 	die();
	 }

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
?>
