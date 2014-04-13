<?php

	class View {
		function __construct(){}

		/*
		 * render()
		 * @param string $name: folder inside of view folder and controller class name
		 * @param string $title: Text to be set in the title tag
		 * @param boolean $alone: set to true to render ONLY the view file (no header/footer)
		 */
		public function render($name, $title = "Home", $alone = false){
			if($alone) {
				require_once "views/" . $name . ".view.php";
			} else {

				if(isset($_SESSION['_TITLE_'])){
					Session::change("_TITLE_", $title);
				} else {
					Session::set("_TITLE_", $title);
				}
				require_once "views/header.php";
				require_once "views/" . $name . ".view.php";
				require_once "views/footer.php";

			}
		}
	}