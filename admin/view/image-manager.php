<?php 

include_once('layouts/header.php');
include('Dashboard.php');
include_once('../controller/Image.php');
include_once('../controller/Crud.php');


 ?>
 

	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<?php  
					if (isset($message)) 
						echo '<label class="alert">'.$message."</label>";
				?>
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
								<input type="submit" name="upload" value="Upload" class="btn btn-primary">
							</td>
						</tr>
					
					</table>
				</form>
			</div>
		</div>
	</div>


		<div class="container">
		<div class="row">
			<div class="col-md-10">
				
				<form method="post">

					<table class="table table-bordered">

						<tr>
							<td>ID</td>

							<td>Manage</td>
							<td></td>
							<td></td>
							
						
						
						</tr>
						 <?php 

						 	$rows = $image->show_images();
						 	
						 	foreach ($rows as $key => $value) {
						 		
						 	
						 		

						
						 	?>
						
						<tr>
							<td><?php echo $value['id']; ?></td>
							<td><img src="http://localhost/newassign/admin/static/upload/<?php echo $value['image'] ?>"></td>
							
							<td><a href="http://localhost/newassign/admin/view/image-manager.php/?delete=1&id=<?php echo $value['id']?>" class="btn btn-danger">Delete</a></td>
						
						
						</tr>
						<?php }  ?>
				
					</table>
				</form>

			
				
			
				
			</div>
		</div>
	</div>


	
<?php include_once('layouts/footer.php') ?>
