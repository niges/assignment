
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity
	="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript" src="http://localhost/newassign/admin/static/public/js/script.js"></script>

	<link rel="stylesheet" type="text/css" href="http://localhost/newassign/admin/static/public/css/style.css">
	
	<script type="text/javascript" src="http://localhost/newassign/admin/static/public/js/ckeditor/ckeditor.js"></script>
	<script src="http://localhost/newassign/admin/static/public/lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
	<link href="http://localhost/newassign/admin/static/public/lightbox/dist/css/lightbox.min.css" rel="stylesheet">

</head>
<body>
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

