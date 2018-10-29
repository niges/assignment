<?php 

include_once(__dir__.'/admin/view/layouts/header.php');
include_once(__dir__.'/admin/controller/Image.php');
include_once(__dir__.'/admin/controller/Crud.php');
include_once(__dir__.'/admin/data/Settings.php');

?>
	<div class="container">
 		<div class="row">
 			<div class="col-md-8">
				<?php 

					$urlresult = $settings->Setting();
					foreach ($urlresult as $key => $url) {	

					}			
				?>
 				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				  <div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav">	
				    	<?php
				      		$title = $crud->show_parent();
				      		foreach ($title as $key => $value) {
				    
				      	?>
				      	<?php 

				      	$result = $crud->dropdown_child($value['id']);
				     	if (count($result)==0) {
				     		
				      	?>
				        <li class="nav-item active">

				        <a class="nav-link " href="<?php echo $url['server_root'] ?><?php echo $value['slug'] ?>/<?php echo $value['id'] ?>/"><?php echo $value['title'] ?><span class="sr-only">(current)</span></a>

				        </li>
				       <?php } else { ?>

				       	<li class="nav-item active dropdown">

					        <a class="nav-link dropdown-toggle dropbtn" href="<?php echo $url['server_root'] ?><?php echo $value['slug'] ?>/<?php echo $value['id'] ?>/">
					         <?php echo $value['title'] ?>
					        </a>

					        <div class="dropdown-content">
					          <?php 

					          foreach ($result as $key => $sub) { 

					          ?>

					          <a class="dropdown-item" href="<?php echo $url['server_root'] ?><?php echo $sub['slug'] ?>/<?php echo $value['id'] ?>/">
					         	
					          	<ul class="navbar-nav">
					          	
					          	 <li><?=$sub['title']?></li>
					          	</ul>
					          <?php } ?>

					          </a>
			 
					        </div>
					    </li>

					    <li class="nav-item active">
					    	<a href="<?php echo $url['server_root'] ?>request_quote.php" class="nav-link">Request a quote</a>	
					    </li>

				  		<?php } ?>
				  		<?php } ?>
				 		
				    </ul>
				  </div>
				</nav>
 			</div>
 		</div>
 	</div>


 