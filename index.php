<?php
$title = 'Home';
include_once(__dir__.'/admin/view/layouts/header.php');
include_once(__dir__.'/admin/view/layouts/head.php');
include_once(__DIR__.'/header.php');
include_once(__DIR__.'/admin/controller/Image.php');
include_once(__DIR__.'/admin/controller/Crud.php');
include_once(__DIR__.'/admin/data/Settings.php');
include_once(__DIR__.'/admin/controller/Post.php');
include_once(__DIR__.'/admin/controller/Slider.php');

?>

<div class="container">
	<div class="row">
		<div class="col-md-12"> 
			<br>
	 		<?php
		 		if (isset($_GET['id'])) {
					$data = array('slug' => $_GET['id']);
					$result = $crud->select_data($data);
					foreach ($result as $key => $value) {
						echo $value['body'];
					}

					$imagedata = array('page_id' => $_GET['url']);
					$row = $meta->check_images($imagedata);

					$imageid = ' ';
				
					foreach ($row as $key => $value) {
						$imageid .=$value['images_id'] . ' OR id= ';

					}

					$imageid = rtrim($imageid,'  OR id= ');

					$selectimage = array('id' => $imageid);

					$imagesearch = $image->only_selected($selectimage);

				
					foreach($imagesearch as $key => $value) {	
					
	 		?>
	 		
	 		<a href="<?php echo $server_root ?>admin/static/upload/<?php echo $value['image'] ?>" data-lightbox="roadtrip"><img src="http://localhost/newassign/admin/static/upload/crop/<?php echo $value['crop'] ?>"></a>

	 		<?php } ?>
	 		<?php } elseif(isset($_GET['footer'])) { ?>

	 		<?php 

				$data = array('id'=>$_GET['footer']);
				$footer = $crud->select_data($data);
				foreach ($footer as $key => $value) {

			?>

				<h3><?php echo $value['title']; ?></h3>
				<p><?php echo $value['body']; ?></h3>
					
			</div>

			<?php 

			}

			?>

	 		<?php } else { ?>
	 		<br>
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			  	<?php 

					$result = $slider->show_data();
					foreach ($result as $key => $value) {
					
				?>
			  	<?php 
			  	if ($key==0) {
			  	
			  	 ?>
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="<?php echo $server_root ?>admin/static/upload/<?php echo $value['image'] ?>" alt="First slide" style="width: 160;height: 400;">
			      <div class="carousel-caption">
			          <h3><?php echo $value['title'];?></h3>
			          <p><?php echo $value['content'];?></p>
			       </div>
			    </div>
				<?php } else {?>

			    <div class="carousel-item">
			      <img class="d-block w-100" src="<?php echo $server_root ?>admin/static/upload/<?php echo $value['image'] ?>" alt="Second slide" style="width: 150;height: 400;">
			      <div class="carousel-caption">
						          <h3><?php echo $value['title'];?></h3>
						          <p><?php echo $value['content'];?></p>
						        </div>
			    </div>

				<?php } }?>
				 <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				 <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				   <span class="carousel-control-next-icon" aria-hidden="true"></span>
				 	<span class="sr-only">Next</span>
				  </a>
			</div>	
			<br>
	 			
	 				
	 				<div class="col-md-12" style="background-color: #e9ecef;">
	 					<h3>Latest Posts</h3>
	 				
 						<?php
			 				$data = $post->show_data($offset=0,$limit=3);
			 				foreach ($data as $key => $pdata) {
			 					$postid = array('id' => $pdata['id']);
			 					$id = $post->select_data($postid);
			 					$result = $post->fetch($id);
			 					foreach ($result as $key => $id) {
			 					}
			 					$newid = $id['id'];
			 					$post_id = array('page_id'=>$newid);
			 					$rows = $meta->check_images($post_id);

			 					$imageid = ' ';
				
								foreach ($rows as $key => $value) {
								}
								$imageid .=  $value['images_id'];
								$selectimageforpost = array('id' => $imageid);
								$newimage = $image->select_image($selectimageforpost);
								
								foreach ($newimage as $key => $value) {
						?>
												
								<h3><?php echo $pdata['title'] ?></h3>
								
								<a href="<?php echo $server_root ?>admin/static/upload/<?php echo $value['image'] ?>" data-lightbox="roadtrip"><img src="http://localhost/newassign/admin/static/upload/<?php echo $value['image'] ?>" class="center"></a>	
								<hr>
								<?php } ?>
								<?php
					 	
				 					if (strlen($pdata['content'])>100) {
				 						echo substr($pdata['content'],0,300).'...'.'<br>';
					 			?>
					 				<a href="read-more/<?php echo $pdata['id']; ?>/" class="btn btn-primary">Read More</a>
					 			<?php
				 					} else { ?>

				 					<div><?php echo $pdata['content']; ?></div>
					 				<a href="read-more/<?php echo $pdata['id']; ?>/" class="btn btn-primary">Read More</a>
					 			<?php } ?>

					 			<?php

					 				echo '<hr >';
						 			
						 			} 					 				
					 			?>	
					 			<a href="view-all.php" class="btn btn-lg btn-dark">View All POST</a>
			 		</div>

			 		<br>
	 		<?php	} ?>
 		</div>
	</div>
</div>
	

<?php
include_once(__dir__.'/admin/view/layouts/footer.php');
?>
