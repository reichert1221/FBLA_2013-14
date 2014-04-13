    <div class="container">

      <div class="center">
        <h1>Reserve the Courtyard</h1>
    </div>

    <div class="col-md-6">
    	The Tea Party:<br />
    	The courtyard is located behind the the B&B in the Formal Gardens. It is perfect for birthdays, wedding and baby showers, business meetings, and more! When you reserve the courtyard, it is your's for the entire afternoon, and the clean up is on us. When you select you time, you have the option for <i>The Dream: A Steakhouse</i> to cater for your party.  <i>The Premier Golf Course</i> offers all business groups a free round of golf (drinks provided) for a small additional cost.
    	Always included are the <b>free</b> premium teas, mini-sandwiches, and small desserts.
    	<br /><br />
    	The <i>Steakhouse</i> Catering Option Include:<br />
    	<ul>
    		<p class="center-clean"> Main Course </p>
    			<li>10 Filet Mignons (8oz.)</li>
    			<li>15 Ribeye Cuts (12oz.)</li>
    				<ul><li><i>A Porterhouse cut can be substituted</i></li></ul>
    		<p class="center-clean"> Side Dish One </p>
    			<li>Mashed Potatoes (with Gravy)</li>
    			<li>Romain Lettuce Salad</li>
    		<p class="center-clean"> Side Dish Two </p>
    			<li>Sautéed Shrimp and Grilled Wild Salmon</li>
    			or
    			<li>Garlic Bread and Sautéed Fresh Vegetables</li>
    		<p class="center-clean"> Beverages <p>
    			<li> Iced Tea </li>
    			<li> Lemonade </li>
    			<li> Water </li>
    			<li> Soda </li>
    	</ul>
       <hr />
       In-House Catering (included)<br />
    	<ul>
    		<p class="center-clean"> Breads </p>
    			<li>Fresh Croissants</li>
    		<p class="center-clean">Sandwiches</p>
    			<li>Ham and Turkey with cheese and lettuce on flat bread</li>
    			<li>Ham with cheese and lettuce on flat bread</li>
    			<li>Roast Beef with cheese and lettuce of flat bread</li>
    		<p class="center-clean"> Dessert </p>
    			<li>French Shortbread Cookies</li>
    			<li>Apple Tart</li>
    			<li>Raspberry Brûlée</li>
    		<p class="center-clean"> Beverages <p>
    			<li> Lemonade </li>
    			<li> Water </li>
    			<li> Soda </li>
    		<p class="center-clean"> Premium Teas </p>
    			<li> Premium Iced Tea </li>
    			<li> Organic Black Tea </li>
    			<li> Organic Peach flavored Black Tea </li>
    			<li> Organic Green Tea </li>
    			<li> Passion Fruit Black Tea </li>
    			<li> Blackberry Black Tea </li>
    			<li> Premium White Tea </li>
    	</ul>
		<hr />
    </div>


    <div class="col-md-6">

    	<form role="form" id="form" action="/reserve/court" method="POST">
		  <div class="form-group">
			<label for="emailInput">Email Address</label>
			<input type="email" class="form-control" id="emailInput" placeholder="example@e-mail.com" required>
		  </div>
		  <div class="form-group">
			<label for="groupName">Group Name</label>
			<input type="text" class="form-control" name="groupName" id="groupName" placeholder="The John Doe Foundation" required>
			<input type="checkbox" name="golf" value="true">Business Group (free round of golf)
		  </div>
		  <div class="form-group">
			<label for="firstName">Your First Name</label>
			<input type="text" class="form-control" name="firstName" id="firstName" placeholder="John" required>
		  </div>
		  <div class="form-group">
			<label for="lastName">Your Last Name</label>
			<input type="text" class="form-control" name="lastName" id="lastName" placeholder="Doe" required>
		  </div>
		  <div class="form-group">
			<p>Catering Type</p>
			<input type="radio" name="cater" value="opt1" checked> Included Catering <br />
			<input type="radio" name="cater" value="opt2">Side Dish Two: Sautéed Shrimp and Grilled Wild Salmon <br />
			<input type="radio" name="cater" value="opt3"> Side Dish Two: Garlic Bread and Sautéed Fresh Vegetables <br />
			<input type="checkbox" name="porterhouse" value="true"> Substitute Ribeye for Porterhouse

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
		  <button  id="sub" type="submit" class="btn btn-default">Make Reservation</button>
 		  <p class="help-block">You will pay upon your arrival.</p>

		</form>
		<script type="text/javascript">
			$("#form").validate();
		</script>

    </div>