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
			<a href="add-post.php" class="btn btn-lg btn-info">Add Post</a>
			<br>
			<br>

			<?php 
				if(!isset($_GET['id'])) {
					$page = 1;
				} else {
					$page = $_GET['id'];

				}

				$result = $pagination->select_post($page); 

			?>
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
		 			foreach ($result as $key => $value) {
		 		
		 		?>
			 	<tr>
			 		<td><?php echo $value['id'] ?></td>
			 		<td><?php echo $value['title'] ?></td>
			 		<td><?php echo $value['content'] ?></td>
			 		<td><?php echo $value['seo_title'] ?></td>
			 		<td><?php echo $value['meta_title'] ?></td>
			 		<td><a href="post-manager/?edit=1&id=<?php echo $value['id'] ?>"  class="btn btn-primary">Edit</a></td>
			 		<td><a href="post-manager?delete=1&id=<?php echo $value['id'] ?>" class="btn btn-danger">Delete</a></td>
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
						<div class="col-md-1"><a href="new.php?id=<?php echo $i; ?>"><?php echo $i; ?></a></div>
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

 <?php include_once(__dir__.'/layouts/footer.php'); ?>