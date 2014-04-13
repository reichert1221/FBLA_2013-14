<?php
	class Activities extends Controller {

		function __construct(){
			parent::__construct();
		}

		public function display(){
			$this->view->render("activities/default", "View All Activites");
		}

		public function fun() {
			//Fun
		}

		public function food() {
			//Food
		}
	}
