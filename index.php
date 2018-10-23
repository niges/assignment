<?php 

include_once(__dir__.'/admin/view/layouts/header.php');
include_once(__DIR__.'/admin/controller/Image.php');
include_once(__DIR__.'/admin/controller/Crud.php');
include_once(__DIR__.'/admin/data/Settings.php');


?>
	<div class="container">
 		<div class="row">
 			<div class="col-md-8">
 				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				  <div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav">
				    	<?php
				      		$title = $crud->show_data();
				      		foreach ($title as $key => $value) {
				    
				      	?>
				        <li class="nav-item active">
				      	<?php 

							$urlresult = $settings->Setting();
							foreach ($urlresult as $key => $url) {				

						?>

				        <a class="nav-link" href="<?php echo $url['server_root'] ?>index.php/?id=<?php echo $value['id'] ?>"><?php echo $value['title'] ?><span class="sr-only">(current)</span></a>
				        </li>
				  		<?php } ?>
				 		<?php } ?>
				    </ul>
				  </div>
				</nav>
 			</div>
 		</div>
 	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-8"> 
		 		<?php
			 		if (isset($_GET['id'])) {
						$data = array('id' => $_GET['id']);
						$result = $crud->select_data($data);
						foreach ($result as $key => $value) {
							echo $value['body'];
						}
						$imagedata = array('page_id' => $_GET['id']);
						$row = $meta->check_images($imagedata);

						$imageid = ' ';
					
						foreach ($row as $key => $value) {
							$imageid .=  $value['images_id'] . " OR id= ";

						}

						$imageid = rtrim($imageid,'  OR id= ');

						$selectimage = array('id' => $imageid);

						$imagesearch = $image->only_selected($selectimage);

						foreach($imagesearch as $key => $value) {	
								
		 		?>
		 		
		 		<a href="http://localhost/newassign/admin/static/upload/<?php echo $value['image'] ?>" data-lightbox="roadtrip"><img src="http://localhost/newassign/admin/static/upload/crop/<?php echo $value['crop'] ?>"></a>

		 		<?php } ?>
		 		<?php } ?>
	 		</div>
		</div>
	</div>
	<br>

	<div class="container">
		<div class="row">
			<div class="col-md-20">
				<?php 
				if (empty($_GET['id'])) {

				$getimage = $image->show_images(); 
				foreach ($getimage as $key => $value) {
			
				?>
				<a href="http://localhost/newassign/admin/static/upload/<?php echo $value['image'] ?>" data-lightbox="roadtrip" style="padding:10px;"><img style="margin-bottom: 10px;" src="http://localhost/newassign/admin/static/upload/crop/<?php echo $value['crop'] ?>"></a>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>

		

<?php
include_once(__dir__.'/admin/view/layouts/footer.php');
?>