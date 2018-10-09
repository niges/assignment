
<?php
include('page-manager.php');
include_once('../controller/Crud.php');
include_once('../controller/Image.php');

// if(!isset($_SESSION['email'])) {
//  	header("Location:../login.php");
//  }
 ?>



<body>
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

							
					
							
										

							
							
							<td><a href="http://localhost/newassign/admin/view/show.php/?update=1&id=<?php echo $value['id'] ?>" class="btn btn-primary" name="edit">Edit</a></td>
							<td>
								<a href="http://localhost/newassign/admin/view/show.php/?delete=1&id=<?php echo $value['id'] ?>" class="btn btn-danger" name="delete" onclick="alert('Do you want to delete')">Delete
								</a>



							</td>
							<td><a href="http://localhost/newassign/admin/view/images-files.php/?show=1&id=<?php echo $value['id'] ?>" class="btn btn-success">View Image</a></td>
						
						
						</tr>

					<?php } ?>
							

								
					</table>
				</form>
			
				 
			</div>
		</div>
	</div>


<?php } ?>


							
										

<?php include_once('layouts/footer.php') ?>






