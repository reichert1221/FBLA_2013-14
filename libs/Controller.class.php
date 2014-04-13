<?php

	abstract class Controller {
		function __construct() {
			$this->view = new View();
		}

		/*
		 * loadModel()
		 * @param string $name: name of controller
		 * Note: this method is called in the Bootstrap
		 */
		public function loadModel($name) {

			$path = MODELPATH . $name . ".model.php";
			if(file_exists($path)){
				require $path;
				$modelName = $name . "_Model";
				$this->model = new $modelName();
			}//IF

		}//Function

	}