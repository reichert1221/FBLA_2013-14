<?php

	class About extends Controller {

		function __construct(){
			parent::__construct();
		}

		public function display(){
			$this->view->render("about/about", "From the Inn Keeper");
		}
	}