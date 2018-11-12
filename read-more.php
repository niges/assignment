<?php
include_once(__dir__.'/admin/view/layouts/header.php');
include_once(__dir__.'/admin/view/layouts/head.php');
include_once(__DIR__.'/header.php');
include_once(__DIR__.'/admin/controller/Image.php');
include_once(__DIR__.'/admin/controller/Crud.php');
include_once(__DIR__.'/admin/data/Settings.php');
include_once(__DIR__.'/admin/controller/Subscribe.php');
include_once(__DIR__.'/admin/controller/Post.php');


if (isset($_GET['id'])) {
	$data = array('id' => $_GET['id']);
	$result = $post->select_data($data);
	foreach ($result as $key => $value) {
	?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
	
 					$newid = $_GET['id'];
 					$post_id = array('page_id'=>$newid);
 					$rows = $meta->check_images($post_id);
 					$imageid = ' ';
	
					foreach ($rows as $key => $images) {

						$imageid .=  $images['images_id'] . " OR id= ";
					}

					$imageid = rtrim($imageid,'  OR id= ');
					// $imageid .=  $images['images_id'];
					$selectimageforpost = array('id' => $imageid);

					$imagesearch = $image->only_selected($selectimageforpost);
					
					foreach ($imagesearch as $key => $nameofimage) {
							
						
				?>
					<a href="<?php echo $server_root ?>admin/static/upload/<?php echo $nameofimage['image'] ?>" data-lightbox="roadtrip"><img src="<?php echo $server_root ?>admin/static/upload/crop/<?php echo $nameofimage['crop'] ?>"></a>

				<?php } ?>		

				<h3><?php echo $value['title'] ?></h3>
				<hr>
				<?php echo $value['content'] ?>
			</div>
		</div>
	</div>
	<?php } ?>
<?php } ?>


<?php
include_once(__dir__.'/admin/view/layouts/footer.php');
?>