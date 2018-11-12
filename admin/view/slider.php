<?php 
include_once(__dir__.'/layouts/header.php');
include_once(__dir__.'/dashboard.php');
include_once(__DIR__.'/../data/Settings.php');
include_once(__DIR__.'/../controller/Slider.php');

 ?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-10">

			
			<?php
			if (isset($_GET['edit']) && isset($_GET['id'])) {

				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$where = array( 'id' => $id);
					$row = $slider->select_data($where);
					
					foreach ($row as $key => $value) {
						
					}
				}
			?>
			<form method="post">
				<table class="table table-bordered">
					<tr>
						<td><input type="hidden" name="id" value="<?php echo $id; ?>"> </td>
					</tr>
					<tr>
						<td>Title:<input type="text" name="title" class="form-control" value="<?php echo $value['title'] ?>"></td>
					</tr>
					<tr>
						<td>Body:<textarea name="content" rows="10" cols="100" class="form-control ckeditor" ><?php echo $value['content'] ?></textarea></td>
					</tr>
					<tr>
						<td> 
							<div class="input-group-append">
								<span class="input-group-text"><input type="file" name="file[]" multiple="multiple" value=""></span>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="edit" value="Update" class="btn btn-success"></td>
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
			<a href="add-slider.php" class="btn btn-lg btn-info">Add Slider</a>
			<br>
			<br>
			 <table class="table table-bordered">
			 	<tr>
			 		<td>Id</td>
			 		<td>Title</td>
			 		<td>Content</td>
			 		<td></td>
			 		<td></td>
			 	</tr>
			 	<?php
		 			$result = $slider->show_data();
		 			foreach ($result as $key => $value) {
		 				
		 			
		 		?>

			 	<tr>
			 		<td><?php echo $value['id'] ?></td>
			 		<td><?php echo $value['title'] ?></td>
			 		<td><?php echo $value['content'] ?></td>
			 		<td><a href="?edit=1&id=<?php echo $value['id'] ?>"  class="btn btn-primary">Edit</a></td>
			 		<td><a href="?delete=1&id=<?php echo $value['id'] ?>" class="btn btn-danger">Delete</a></td>
			 		<td><a href="slider-image.php?show-slider=1&id=<?php echo $value['id'] ?>" class="btn btn-success">View Image</a></td>
			 	</tr>
			 	<?php
			 		}
			 	?>
			 	
			 </table>

			
		</div>
	</div>
</div>
<?php } ?>

<?php include_once(__dir__.'/layouts/footer.php'); ?>