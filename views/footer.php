	  <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; Harrisonville FBLA &middot; </p>
        <p> Created by David Reichert with the Twitter Bootstrap. The Twitter Bootstrap has been acquired under the Apache 2 license and is copyright 2013 Twitter. The license can be found <a href="/license.txt">here</a>. This site is fictitious and all information should be considered as such. </p>
        <p> Background image obtained under a royalty free license from <a href="http://www.pixeden.com">http://www.pixeden.com</a>. All images obtained through <a href="http://www.morguefile.com">http://www.morguefile.com</a> under a royalty free license. </p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/Assets/js/bootstrap.min.js"></script>
		<?php
			if(isset($this->js)){
				foreach($this->js as $js){
					echo "<script type='text/javascript' src='" . $js . "'></script>";
				}
			}
		?>
  </body>
</html>
