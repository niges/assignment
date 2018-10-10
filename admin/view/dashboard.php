<?php 


include_once(__DIR__.'/../controller/Session.php');
include_once(__DIR__.'/layouts/header.php');
include_once(__DIR__.'/../data/Settings.php')

 ?>

 <body>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-8">
 				<?php
 					$row = $settings->setting();
 					foreach ($row as $key => $value) {
 						
 					}
 					

 				 ?>
 				<a href="<?php echo $value['server_root']; ?>admin/view/page-manager.php" class="btn btn-primary">Page Manager</a>
 				<a href="<?php echo $value['server_root']; ?>admin/view/admin-manager.php" class="btn btn-primary">Admin Manager</a>
 				<a href="<?php echo $value['server_root']; ?>admin/view/image-manager.php" class="btn btn-primary">Image Manager</a>
 				<a href="<?php echo $value['server_root']; ?>admin/view/logout.php" class="btn btn-primary">Logout</a>
 			</div>
 		</div>
 	</div>
<?php include_once('layouts/footer.php');