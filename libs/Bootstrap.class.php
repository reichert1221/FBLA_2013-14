<?php

	final class Bootstrap {

		protected $_url = null;
		protected $_controller = null;

		protected $_controllerPath = CONTROLLER_PATH;
		protected $_defController = DEF_CONTROLLER;
		protected $_errorFile = DEF_ERROR;

		/*
		 * boot(): Runs the bootstrap
		 */
		public function boot(){
			$this->_getURL();

			if(empty($this->_url[0])){
				$this->_loadDefaultController();
				return false;
			}

			$this->_loadController();

			$this->_callControllerMethod();
		}

		/*
		 * _getURL(): Fetches url from $_GET
		 * Sets the filtered url (array) to $this->_url
		 */
		protected function _getURL() {
			$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : null;
			$url = rtrim($url, '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode("/", $url);
			$this->_url = $url;
		}

		/*
		 * _loadDefaulController: Loads the default controller (home.controller.php)
		 *
		 * This method only should be called inside of the if statement provided in Bootstrap::boot()
		 */
		protected function _loadDefaultController() {
			require $this->_controllerPath . DS . $this->_defController . ".controller.php";

			$this->_controller = new $this->_defController();
			$this->_controller->loadModel($this->_defController);
			$this->_controller->display();
		}

		/*
		 * _loadController(): Loads the supplied controller (url[0])
		 *
		 * Checks if the parameter supplied is a true file
		 */
		protected function _loadController() {
			$file = $this->_controllerPath . $this->_url[0] . ".controller.php";

			if(file_exists($file)){
				require $file;
				$this->_controller = new $this->_url[0];
				$this->_controller->loadModel($this->_url[0]);
			} else {
				$this->_callError("fof");
				die();
				return false;
			}
		}

		/*
		 * _callControllerMethod(): Calls the method requested with parameters supplied
		 *
		 * Ex. www.example.com/controller/method/param1/param2/param3
		 *
		 *	$this->_url[0] = Controller (required)
		 *	$this->_url[1] = Method (optional)
		 *	$this->_url[2] = Parameter (optional)
		 *	$this->_url[3] = Parameter (optional)
		 *	$this->_url[4] = Parameter (optional)
		 */
		protected function _callControllerMethod() {
			$length = count($this->_url);

			if($length > 1){
				if(!method_exists($this->_controller, $this->_url[1])) {
					$this->_callError("fof");
					return false;
				}
			}

			switch($length) {
				case 5:
					$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
					break;

				case 4:
					$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
					break;

				case 3:
					$this->_controller->{$this->_url[1]}($this->_url[2]);
					break;

				case 2:
					$this->_controller->{$this->_url[1]}();
					break;

				default:
					$this->_controller->display();
					break;
			}
		}

		/*
		 * _callError(): Calls an error page from $this->_errorFile (default: error.controller.php in /controllers)
		 */
		protected function _callError($type) {

			require $this->_errorFile;

			$controller = new Error();
			$controller->errorType($type);
		}
	}//CLASS