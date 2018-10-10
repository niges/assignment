<?php

include_once(__DIR__.'/layouts/header.php');
include(__DIR__.'/Dashboard.php');
include_once(__DIR__.'/../controller/Image.php');
include_once(__DIR__.'/../data/Settings.php');
 ?>


	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<?php
						$urlresult = $settings->Setting();
						foreach ($urlresult as $key => $url) {
									
						}
				 ?>	
				
				<form method="post">
					<table class="table table-bordered">
						<tr>
							<td class="btn btn-primary"><a href="<?php echo $url['server_root']; ?>admin/view/add.php" class="btn btn-primary">Add</a></td>
						
							<!-- <td class="btn btn-primary">Edit</td>
						
							<td class="btn btn-primary">Delete</td> -->
					
							<!-- <td class="btn btn-primary"><a href="show.php" class="btn btn-primary" name = "show">Show</a></td> -->
							
							<td class="btn btn-primary"><a href="<?php echo $url['server_root']; ?>admin/view/image-manager.php" class="btn btn-primary">Manage Images</a></td>
						</tr>
					
					</table>
				</form>
			</div>
		</div>
	</div>

		<div class="container">
		<div class="row">
			

	
			<div class="col-md-10">
				<?php
				if (isset($_GET['update'])) {
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						$where = array( 'id' => $id);
						$row = $crud->select_data($where);
					}

				?>
				

				<form method="post">
					<table class="table table-bordered">
						<tr>
							<td><input type="hidden" name="id" value="<?php echo $id; ?>"> </td>
						</tr>
						<tr>
							<td>Title:<input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>"></td>
						</tr>
						<tr>
							<td>Body:<textarea name="body" rows="10" cols="100" class="form-control" ><?php echo $row['body'] ?></textarea></td>
						</tr>

						

						<tr>
							<td>
								<input type="submit" name="update" value="Update" class="btn btn-success"></td>
						</tr>
					
					</table>
				</form>
			
			</div> 
		</div>
	</div>
	<?php }  else {?>
	

	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<?php  
					if (isset($message)) 
						echo '<label class="alert">'.$message."</label>";
				?>
				<?php
				// if (isset($_GET['update'])) {
				// 	$id = $_GET['id'];
				// 	$did = array( 'id' => $id);
				// 	$row = $action->select_data($did);
				?>
				<form method="post">

					<table class="table table-bordered">

						<tr>
							<td>ID</td>
						
							<td>Title</td>
						
							<td>Body</td>
						
							<td>Image</td>
							<td></td>
							<td></td>
						
						
						</tr>
						 
						<?php
							$row = $crud->show_data();
							foreach ($row as $key => $value) {
								# code...
								

							
						

						?>
						<tr>
							<td><?php echo $value['id'] ?></td>
						
							<td><?php echo $value['title'] ?></a></td>
						
							<td><?php echo $value['body'] ?></td>


					
							
								

							
							
							<td><a href="<?php echo $url['server_root']; ?>admin/view/page-manager.php/?update=1&id=<?php echo $value['id'] ?>" class="btn btn-primary" name="edit">Edit</a></td>
							<td>
								<a href="<?php echo $url['server_root']; ?>admin/view/page-manager.php/?delete=1&id=<?php echo $value['id'] ?>" class="btn btn-danger" name="delete" onclick="alert('Do you want to delete')">Delete
								</a>



							</td>
							<td><a href="<?php echo $url['server_root']; ?>admin/view/images-files.php/?show=1&id=<?php echo $value['id'] ?>" class="btn btn-success">View Image</a></td>

						
						
						</tr>

					<?php } ?>
							

								
					</table>
				</form>
			
				 
			</div>
		</div>
	</div>


<?php } ?>
<?php include_once('layouts/footer.php') ?>