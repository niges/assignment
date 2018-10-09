<?php
// include('../action.php');
include('layouts/header.php');
include('Dashboard.php');
include('../controller/Crud.php');

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
							<td>Title:<input type="text" name="title" class="form-control"></td>
						</tr>
						<tr>
							<td>Body:<textarea name="body" rows="10" cols="100" class="form-control"></textarea></td>
						</tr>
						<tr>
							<td> 
								<div class="input-group-append">
    								<span class="input-group-text"><input type="file" name="file"></span>
 								 </div>
 							</td>
						</tr>

						<tr>
							<td>
								<input type="submit" name="add" value="Add" class="btn btn-success">
							</td>
						</tr>
						
					
					</table>
				</form>
			</div>
		</div>
	</div>
<?php include_once('layouts/footer.php') ?>
