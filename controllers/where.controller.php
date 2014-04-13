<?php

	class Where extends Controller {

		function __construct(){
			parent::__construct();
		}

		public function display(){
			$this->view->render("home/home", "From the Inn Keeper");
		}

		public function toEat() {
			$this->view->render("where/toeat", "Places to Eat");
		}

		public function toGo() {
			$this->view->render("where/todo", "What to Do");
		}
	}