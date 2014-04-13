    <div class="container">

      <div class="center">
        <div class="alert alert-success">You have successfully reserved our Courtyard!</div>
        <div class="well well-lg">
        	Congratulations, <?php print $this->reserveName; ?>, you have reserved the Courtyard for <?php print $this->groupName; ?> for the day of: <br>
        	<?php print $this->arriveDate;?> <br>
        	The yard opens for you at 11:45am and stays available to you until 5pm the same day. <br>
        	<b>Options:</b><br>
        	<?php print $this->caterOption . "<br>"; print $this->selectOpt;?>
        </div>
    </div>

    </div>
    <hr />