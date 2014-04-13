    <div class="container">

      <div class="center">
        <h1>Two Night Stay</h1>
        <p class="lead">Twice as good as staying just one night.</p>
    </div>

    <div class="col-md-6">
    	What is in the room:<br />
    	This room includes a fireplace, two queen size (and linens), desk, phone, flat screen TV and cable, and wifi. Included is a local coupon book and cookies.
        <hr />

    </div>


    <div class="col-md-6">

    	<form role="form" action="/reserve/room/twonight" method="POST">
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
			<label>Number of Guests:</label> <select class="form-control"> <option value="1"> 1 </option> <option value="2"> 2 </option> <option value="3"> 3 </option> <option value="4"> 4 </option> </select>
			<p class="help-block">Bringing more? Please, <a href="#contact">contact us</a>.</p>
		  </div>
		  <div class="form-group">
		  	<p> Arriving: <select class="form-control" name="arriveMonth"><?php print $this->monthsList; ?> </select> <select class="form-control" name="arriveDay"><?php print $this->daysList; ?></select> <select class="form-control" name="arriveYear"><?php print $this->yearsList; ?></select> </p>
   		  	<p> Leaving: <select class="form-control" name="departMonth"><?php print $this->monthsList; ?> </select> <select class="form-control" name="departDay"><?php print $this->daysList; ?></select> <select class="form-control" name="departYear"><?php print $this->yearsList; ?></select> </p>
		  </div>
		  <!--<p><a class="btn btn-default btn-md" href="/reserve/room/twonight">Make Reservation</a></p>-->
		  <button id="sub" type="submit" class="btn btn-default hide">Make Reservation</button>
 		  <p class="help-block">You will pay upon your arrival.</p>

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