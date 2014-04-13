<?php
	class Products extends Controller {

		private $_months = "\n <option value='January'> January </option> \n <option value='February'> Feberuary </option> \n <option value='March'> March </option> \n <option value='April'> April </option> \n <option value='May'> May </option> \n <option value='June'> June </option> \n <option value='July'> July </option> \n <option value='August'> August </option> \n <option value='September'> September </option> \n <option value='October'> October </option> \n <option value='November'> November </option> \n <option value='December'> December </option> \n";
		private $_years = "\n <option value='2013'> 2013 </option> <option value='2014'> 2014 </option> <option value='2015'> 2015 </option>";
		private $_days = " ";
		private $_i = 1;

		function __construct(){
			parent::__construct();

			while ($this->_i < 32) {
				$this->_days .= "<option value='" . $this->_i . "'>" . $this->_i . "</option>";
				$this->_i += 1;
			}
			trim($this->_days);
		}

		public function display(){
			$this->view->render("products/details", "View All");
		}

		public function rooms($directive = "details", $type = "all") {
			if ($directive = "details") {
				switch ($type) {

					case "honeymoon":
						$this->view->monthsList = $this->_months;
						$this->view->daysList = $this->_days;
						$this->view->yearsList = $this->_years;
						$this->view->jQueryUI = TRUE;

						$this->view->render("products/rooms/honeymoon", "Honeymoon");
						break;

					case "anniversary":
						$this->view->monthsList = $this->_months;
						$this->view->daysList = $this->_days;
						$this->view->yearsList = $this->_years;
						$this->view->jQueryUI = TRUE;

						$this->view->render("products/rooms/anniversary", "Anniversary");
						break;

					case "extStay":
						$this->view->monthsList = $this->_months;
						$this->view->daysList = $this->_days;
						$this->view->yearsList = $this->_years;
						$this->view->jQueryUI = TRUE;

						$this->view->render("products/rooms/extStay", "Extended Stays");
						break;

					case "one":
						$this->view->monthsList = $this->_months;
						$this->view->daysList = $this->_days;
						$this->view->yearsList = $this->_years;
						$this->view->jQueryUI = TRUE;

						$this->view->render("products/rooms/one", "One Night");
						break;

					case "two":
						$this->view->monthsList = $this->_months;
						$this->view->daysList = $this->_days;
						$this->view->yearsList = $this->_years;
						$this->view->jQueryUI = TRUE;

						$this->view->render("products/rooms/two", "Two Nights");
						break;

					default:
						$this->view->render("products/rooms", "Our Rooms");
						break;
					}
			}
		}

		public function court($directive = "details") {
			$this->view->monthsList = $this->_months;
			$this->view->daysList = $this->_days;
			$this->view->yearsList = $this->_years;
			$this->view->jQueryUI = TRUE;
			$this->view->render("products/court", "Use Our Courtyard");
		}

		public function breakfastMenu() {
			$this->view->render("products/breakfast/menu", "What's for Breakfast?");
		}

	}
