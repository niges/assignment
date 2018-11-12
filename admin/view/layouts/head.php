<?php
include_once(__dir__.'/header.php')
?>	

	<div class="container">
		<div class="jumbotron">
			<h1>	
				<?php
					include_once(__dir__.'/../../data/Settings.php');
					include_once(__dir__.'/../../data/Database.php');

					$settings = new Settings();
					$footer = $settings->setting();

				?>

				<?php
					foreach ($footer as $key => $value) {

				?>
				<img src="<?php echo $value['server_root'] ?>admin/static/upload/<?php echo $value['logo'] ?>">
				<a href="<?php echo $value['server_root'] ?>index.php"><?php echo $value['site_name']; ?></a>
			</h1>
		<?php } ?>
		</div>
	</div>