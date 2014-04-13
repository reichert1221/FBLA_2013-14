<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Config/configuration.php"); // Imports configuration file

	function __autoload($class) {
		require PATH . DS . "libs" . DS . $class . ".class.php";
	}

	Session::start();
	$page = new Bootstrap;
	$page->boot();