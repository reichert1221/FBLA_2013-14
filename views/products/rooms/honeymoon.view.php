    <div class="container">

      <div class="center">
        <h1>Honeymoon Package</h1>
        <p class="lead">Spend a romantic time with us.</p>
    </div>

    <div class="col-md-6">
    	What is in the room:<br />
    	This room includes a fireplace, king size (and linens), flat screen TV and cable, and wifi. Included is a complementary bottle of wine and cookies.
        <hr />


    </div>


    <div class="col-md-6">

    	<form id="formVal" role="form" action="/reserve/room/honeymoon" method="POST">
		  <div class="form-group">
			<label for="emailInput">Email Address</label>
			<input type="email" class="form-control" id="emailInput" placeholder="example@e-mail.com">
		  </div>
		  <div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" name="firstName" id="firstName" placeholder="John" onkeyup="check();" required>
		  </div>
		  <div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Doe" onkeyup="check();" required>
		  </div>
		  <div class="form-group">
			<label class="col-lg-4 control-label">Number of Guests:</label>
			<div class="col-lg-8">
			  <p class="form-control-static">2 Adults</p>
			</div>
			<p class="help-block">Bringing more? Please, <a href="#contact">contact us</a>.</p>
		  </div>
		  <div class="form-group">
		  	<p> Arriving: <select class="form-control" name="arriveMonth"><?php print $this->monthsList; ?> </select> <select class="form-control" name="arriveDay"><?php print $this->daysList; ?></select> <select class="form-control" name="arriveYear"><?php print $this->yearsList; ?></select> </p>
   		  	<p> Leaving: <select class="form-control" name="departMonth"><?php print $this->monthsList; ?> </select> <select class="form-control" name="departDay"><?php print $this->daysList; ?></select> <select class="form-control" name="departYear"><?php print $this->yearsList; ?></select> </p>
		  </div>
		  <!--<p><a class="btn btn-default btn-md" href="/reserve/room/honeymoon">Make Reservation</a></p>-->
		  <button id="sub" type="submit" class="btn btn-default hide">Make Reservation</button>
 		  <p class="help-block" >You will pay upon your arrival.</p>

		</form>
		<script type="text/javascript">
			function check() {
				if ($("#firstName").val() != "" && $("#lastName").val() != "") {
				  $("#sub").removeClass("hide");
				}

				if ($("#firstName").val() == "" || $("#lastName").val() == "") {
				  if($("#sub").hasClass("hide")) {
				  } else {
				  	$("#sub").addClass("hide");
				  }
				}
			}

		</script>

    </div>