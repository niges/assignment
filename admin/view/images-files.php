<?php 
include_once('layouts/header.php');
include('Dashboard.php');
include_once('../Controller/Image.php');
include_once('../Controller/Meta.php');
// include_once('../../controller/AddImage.php');



	if (isset($_GET['show'])) {
		$data = array( 'page_id' => $_GET['id']);
		$row = $meta->check_images($data);
		
		$imageid = ' ';
	
		foreach ($row as $key => $value) {
			$imageid .=  $value['images_id'] . " OR id= ";

		}

		$imageid = rtrim($imageid,'  OR id= ');

		$selectimage = array('id' => $imageid);

		$imagesearch = $image->only_selected($selectimage);

?>

<div class="container">
	<div class="row">
	<div class="col-md-5" style="margin-top:13px;">
		
	
				<form method="post" enctype="multipart/form-data">
					<table class="table table-bordered">
						<tr>
							<td>Image Upload:</td>
						</tr>
						<tr>
							<td> 
								<div class="input-group-append">
    								<span class="input-group-text" id=""><input type="file" name="file"></span>
 								 </div>
 							</td>
 						</tr>
						<tr>
							<td>
								<input type="submit" name="upload" value="Add" class="btn btn-primary">
							</td>
						</tr>
						
					
					</table>
				</form>
	</div>
</div>
	
</div>



<div class="container">
	<table class="table-bordered">
		<tr>
			<td>

					<?php
					foreach ($imagesearch as $key => $value) {
						
					?>
					
						<img width="150" height="150" src="http://localhost/newassign/admin/static/upload/<?php echo $value['image']  ?>" style="padding-right: 30px; margin-bottom: 15px;"> 

						<a href="http://localhost/newassign/admin/view/images-files.php/?delete=1&id=<?php echo $value['id']?>" class="btn btn-danger"">Delete</a>
					<?php } ?>


						
					


					
			</td>
		
		
	</table>	
</div>
<?php			
}

?>
				
	




 