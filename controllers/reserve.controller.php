<?php
	class Reserve extends Controller {

		private $_roomTypes = array ("honeymoon", "anniversary", "multinight", "onenight", "twonight");
		private $_caterTypes = array(
			"opt1" => "In-House Catering",
			"opt2" => "Side Dish Two: Sautéed Shrimp and Grilled Wild Salmon",
			"opt3" => "Garlic Bread and Sautéed Fresh Vegetables"
		);
		private $_option;
		private $_golf = FALSE;
		private $_pthouse = FALSE;
		private $_caterMsg;
		private $_caterMsgTotal;

		private $_arriveMonth;
		private $_arriveDay;
		private $_arriveYear;

		private $_departMonth;
		private $_departDay;
		private $_departYear;

		private $_date;

		function __construct(){
			parent::__construct();
		}

		public function display(){
			header("Location: /");
		}

		private function _handleForm() {
			$this->_arriveMonth = $_POST['arriveMonth'];
			$this->_arriveDay = $_POST['arriveDay'];
			$this->_arriveYear = $_POST['arriveYear'];
			$this->view->arriveDate = $this->_arriveMonth . " " .$this->_arriveDay . ", " . $this->_arriveYear;

			$this->_departMonth = $_POST['departMonth'];
			$this->_departDay= $_POST['departDay'];
			$this->_departYear = $_POST['departYear'];
			$this->view->departDate = $this->_departMonth . " " . $this->_departDay . ", " . $this->_departYear;

			$this->view->reserveName = $_POST['firstName'] . " " . $_POST['lastName'];
		}

		private function _handleCourtForm() {
			$this->_date = $_POST['date'];
			$this->_cater= $_POST['cater'];
			$this->_caterMsg = $this->_caterTypes[$this->_cater];
			$this->view->arriveDate = $this->_date;

			if (isset($_POST['porterhouse'])) {
				$this->_pthouse = TRUE;
			}
			if (isset($_POST['golf'])) {
				$this->_golf = TRUE;
			}
			if ($this->_pthouse) {
				$this->_caterMsgTotal = "You have opted to order the porterhouse cut";
			}
			if ($this->_golf) {
				$this->_caterMsgTotal .= "<br>You have recieved a free round of golf";
			}

			$this->view->reserveName = $_POST['firstName'] . " " . $_POST['lastName'];
			$this->view->groupName = $_POST['groupName'];
			$this->view->caterOption = $this->_caterMsg;
			$this->view->selectOpt = $this->_caterMsgTotal;
		}

		public function room($type = "empty") {
			if (!in_array($type, $this->_roomTypes)) {
				header("Location: /#error");
			} else {

				$this->_handleForm();

				switch ($type) {
					case "honeymoon":
						$this->view->successRoomType = "Honeymoon";
						$this->view->render("reserve/success", "Success");
						break;

					case "anniversary":
						$this->view->successRoomType = "Anniversary";
						$this->view->render("reserve/success", "Success");
						break;

					case "multinight":
						$this->view->successRoomType = "Multinight";
						$this->view->render("reserve/success", "Success");
						break;

					case "onenight":
						$this->view->successRoomType = "One Night";
						$this->view->render("reserve/success", "Success");
						break;

					case "twonight":
						$this->view->successRoomType = "Two Night";
						$this->view->render("reserve/success", "Success");
						break;
				}//SWITCH
			}//IF
		}

		public function court() {
			$this->_handleCourtForm();
			$this->view->render("reserve/courtSuccess", "Success");
		}

	}
