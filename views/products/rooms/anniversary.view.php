    <div class="container">

      <div class="center">
        <h1>Anniversary Package</h1>
        <p class="lead">Celebrate another year together.</p>
    </div>

    <div class="col-md-6">
    	What is in the room:<br />
    	This room includes a fireplace, king size (and linens), phone, flat screen TV and cable, and wifi. Included is a complementary bottle of wine and cookies.
        <hr />

    </div>


    <div class="col-md-6">

    	<form role="form" id="form" action="/reserve/room/anniversary" method="POST">
		  <div class="form-group">
			<label for="emailInput">Email Address</label>
			<input type="email" class="form-control" id="emailInput" placeholder="example@e-mail.com" required>
		  </div>
		  <div class="form-group">
			<label for="firstName">First Name</label>
			<input type="text" class="form-control" name="firstName" id="firstName" placeholder="John" required>
		  </div>
		  <div class="form-group">
			<label for="lastName">Last Name</label>
			<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Doe" required>
		  </div>
		  <div class="form-group">
			<label class="col-lg-4 control-label">Number of Guests:</label>
			<div class="col-lg-8">
			  <p class="form-control-static">2 Adults</p>
			</div>
			<p class="help-block">Bringing more? Please, <a href="#contact">contact us</a>.</p>
		  </div>
		  <div class="form-group">
		  	<script>
			  $(function() {
				$( "#datepicker" ).datepicker({ minDate: new Date() });
			  });
			</script>
			<label for="date">Event Date: </label>
			<input type="date" name="date" id="datepicker" class="form-control" required>
		  </div>
		  <div class="form-group">
		  	<script>
			  $(function() {
				$( "#datepickerII" ).datepicker({ minDate: new Date() });
			  });
			</script>
			<label for="date">Event Date: </label>
			<input type="date" name="date" id="datepickerII" class="form-control" required>
		  </div>
		  <button  id="sub" type="submit" class="btn btn-default">Make Reservation</button>
 		  <p class="help-block">You will pay upon your arrival.</p>

		</form>
		<script type="text/javascript">
			$("#form").validate();
		</script>

    </div>