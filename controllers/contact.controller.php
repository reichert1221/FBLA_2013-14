<?php

	class Contact extends Controller {

		function __construct(){
			parent::__construct();
		}

		public function display(){
			$this->view->render("contact/contact", "Contact Us");
		}
	}