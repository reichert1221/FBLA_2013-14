    <div class="container">

      <div class="center">
        <div class="alert alert-success">You have successfully reserved the <?php print $this->successRoomType; ?> Package.</div>
        <div class="well well-lg">
        	Congratulations, <?php print $this->reserveName; ?>, you have reserved a <?php print $this->successRoomType; ?> Package for the following dates: <br>
        	<?php print $this->arriveDate . " - " . $this->departDate; ?> <br>
        	Check-in starts at noon. Please call ahead if you plan on arriving later than 7:00PM.
        </div>
    </div>

    </div>
    <hr />