<?php

	class Home extends Controller {

		function __construct(){
			parent::__construct();

			$this->view->css = array("/views/home/CSS/carousal.css");
		}

		public function display(){
			$this->view->render("home/home", "Home");
		}
	}