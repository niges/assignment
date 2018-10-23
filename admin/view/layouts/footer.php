
<footer class="page-footer font-small blue">

  <div class="footer-copyright text-center py-3">
  	<?php
		include_once(__dir__.'/../../data/Settings.php');
		include_once(__dir__.'/../../data/Database.php');

		$settings = new Settings();
		$footer = $settings->setting();

		foreach ($footer as $key => $value) {
			
		}
		echo $value['footer'];

	?>
   
  </div>

</footer>

</body>
</html>