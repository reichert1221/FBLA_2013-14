<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php print Session::get("_TITLE_"); ?></title>

	<link href="/Assets/Images/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- Bootstrap core CSS -->
    <link href="/Assets/css/bootstrap.min.css" rel="stylesheet"><!-- change to minified version -->
    <link href="/Assets/css/custom.css" rel="stylesheet">
    <?php
			if(isset($this->css)){
				foreach($this->css as $css){
					echo "<link type='text/css' href='" . $css . "' rel='stylesheet'>";
				}
			}
		?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <?php
    	if(isset($this->jQueryUI) && $this->jQueryUI == TRUE) {
    		print' <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>';
    		print' <script src="/Assets/JS/jquery.validate.min.js"></script>';
    		print'   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">';
    	}
    ?>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand"><?php print NAME; ?></div>
            </div>

            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li <?php if(Session::get('_TITLE_') == "Home") echo "class='active'"; ?>><a href="/">Home</a></li>
                <li <?php if(Session::get('_TITLE_') == "From the Inn Keeper") echo "class='active'"; ?>><a href="/about">From the Inn Keeper</a></li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stay Here <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/products/rooms/details/">Room Reservations</a></li>
                    <li><a href="/products/court/details">Host Your Own Event</a></li>
                    <li><a href="/products/breakfastMenu">Breakfast Menu</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Things to Do</li>
                    <li><a href="/where/togo">Where to Go</a></li>
                    <li><a href="/where/toeat">Where to Eat</a></li>
                  </ul>
                </li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="#facebook" ><img src="/Assets/Images/Facebook Ribbon Icon.png" rel='tooltip' style="position: absolute;" alt="Facebook"></a></li>
                <li><a href="#twitter" ><img src="/Assets/Images/Twitter Icon.png" rel='tooltip' style="position: absolute; margin-left: 100px;" alt="Twitter"></a></li>
                <li><noscript><span style="color:red;"> Warning! This site requires javascript to function correctly! </span></noscript></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>


