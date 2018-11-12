<?php 


include_once(__DIR__.'/../controller/Session.php');
include_once(__DIR__.'/layouts/header.php');
include_once(__DIR__.'/layouts/head.php');
include_once(__DIR__.'/../data/Settings.php')

 ?>

 	<div class="container">
 		<div class="row">
 			<div class="col-md-10">
 				<?php
 					$row = $settings->setting();
 					foreach ($row as $key => $value) {
 						
 					}
 				?>

	 			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				   <div class="collapse navbar-collapse" id="navbarNav">
					    <ul class="navbar-nav">

					      <li class="nav-item active">
					        <a href="<?php echo $value['server_root']; ?>admin/page-manager.php" class="nav-link" >Page Manager</a> <span class="sr-only">(current)</span></a>
					      </li>

					      <li class="nav-item active">
					        <a href="<?php echo $value['server_root']; ?>admin/post-manager.php" class="nav-link" >Post Manager</a> <span class="sr-only">(current)</span></a>
					      </li>

					      <li class="nav-item">
					      <a href="<?php echo $value['server_root']; ?>admin/admin-manager.php" class="nav-link" >Admin Manager</a></a>
					      </li>

					      <li class="nav-item">
					       <a href="<?php echo $value['server_root']; ?>admin/image-manager.php" class="nav-link" >Image Manager</a></a>
					      </li>

					       <li class="nav-item">
					       <a href="<?php echo $value['server_root']; ?>admin/site-configuration.php" class="nav-link" >Site Configuration</a>
					       </li>

					        <li class="nav-item">
					       	<a href="<?php echo $value['server_root']; ?>admin/newsletter-subscriber.php" class="nav-link" >Subscribers</a>
					      	</li>

					      	<li class="nav-item">
					       	<a href="<?php echo $value['server_root']; ?>admin/slider.php" class="nav-link" >Slider</a>
					      	</li>

					      <li class="nav-item">
					       <a href="<?php echo $value['server_root']; ?>admin/logout.php" class="nav-link">Logout</a>
					      </li>
					    </ul>
					    
				   </div>
				</nav>
 			</div>
 		</div>
 	</div>
