<?php 
include_once(__dir__.'/layouts/header.php');
include_once(__dir__.'/dashboard.php');
include_once(__DIR__.'/../controller/Post.php');
include_once(__DIR__.'/../controller/Pagination.php');
include_once(__DIR__.'/../data/Settings.php');

 ?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-10">

			<h4>Edit Post</h4>
			<?php
			if (isset($_GET['edit']) && isset($_GET['id'])) {
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$where = array( 'id' => $id);
					$row = $post->select_data($where);
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
						<td>Seo Title:<input type="text" name="seo-title" class="form-control" value="<?php echo $value['seo_title'] ?>"></td>
					</tr>
					<tr>
						<td>Meta Title:<input type="text" name="meta-title" class="form-control" value="<?php echo $value['meta_title'] ?>"></td>
					</tr>
					<tr>
						<td>isActive:<input type="text" name="isActive" class="form-control" value="<?php echo $value['active'] ?>"></td>
					</tr>
					<tr>
						<td>Date:<input type="date" name="date" class="form-control" value="<?php echo $value['date'] ?>"></td>
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
			<a href="add-post.php" class="btn btn-lg btn-info">Add Post</a>
			<br>
			<br>
			 <table class="table table-bordered">
			 	<tr>
			 		<td>Id</td>
			 		<td>Title</td>
			 		<td>Content</td>
			 		<td>Seo Title</td>
			 		<td>Meta Title</td>
			 		<td></td>
			 		<td></td>
			 	</tr>
		 		<?php 

		 		$row = $post->show_data($offset=0,$limit=5);

		 		foreach ($row as $key => $value) {
		 		?>
			 	<tr>
			 		<td><?php echo $value['id'] ?></td>
			 		<td><?php echo $value['title'] ?></td>
			 		<td><?php echo $value['content'] ?></td>
			 		<td><?php echo $value['seo_title'] ?></td>
			 		<td><?php echo $value['meta_title'] ?></td>
			 		<td><a href="?edit=1&id=<?php echo $value['id'] ?>"  class="btn btn-primary">Edit</a></td>
			 		<td><a href="?delete=1&id=<?php echo $value['id'] ?>" class="btn btn-danger">Delete</a></td>
			 		<td><a href="images-files.php?show=1&id=<?php echo $value['id'] ?>" class="btn btn-success">View Image</a></td>
			 	</tr>
			 	<?php } ?>
			 </table>

			<?php
			if ($paginate<5) {
			?>

			<?php
			} else {
			?>
			<div class="row">
				<?php
					for ($i=1; $i <= ceil($paginate/$page_no); $i++) { 
					
					?>
						<div class="col-md-1"><a href="view/new.php?id=<?php echo $i; ?>"><?php echo $i; ?></a></div>
					<?php
					}
					?>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php } ?>

<?php include_once(__dir__.'/layouts/footer.php'); ?>