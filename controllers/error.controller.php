<?php

	class Error extends Controller {

		function __construct(){
			parent::__construct();
		}

		protected $_errorTypes = array(
			"articleID" => "Opps, the article you requested cannot be found. Please insure that the link you clicked is correct. If it is, the requested page may have been deleted",
			"page" => "Sorry, the page you request cannot be found.",
			"fof" => "We're afraid that we can't find the page you want!",
			"authreq" => "This page requires authorization",
			"forb" => "This page is forbidden to your access.",
			"sererr" => "This is completely OUR bad! Repair crews are being dipatched! We hope you'll forgive us."
		);

		protected $_errorCodes = array(
			"articleID" => "404",
			"page" => "404",
			"fof" => "Uh-oh, I got lost! (404)",
			"authreq" => "Can't do that. (401)",
			"forb" => "Can't do that. (403)",
			"sererr" => "This is embarassing.... (500)"
		);


		public function display(){
			$this->view->msg = "The Page Requested does not exists";
			$this->view->code = "";
			$this->view->render('error/error', "Error!");
		}

		public function errorType($type) {
			if (array_key_exists($type, $this->_errorTypes)) {
				$errorMsg = $this->_errorTypes[$type];
				$errorCode = $this->_errorCodes[$type];
			} else {
				$errorMsg = "There has been an error";
				$errorCode = "";
			}
			$this->view->msg = $errorMsg;
			$this->view->code = $errorCode;
			$this->view->render('error/error', "Error!");
		}
	}