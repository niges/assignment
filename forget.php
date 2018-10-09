
<?php

include('admin/controller/Recovery.php');
include('admin/view/layouts/header.php');

?>

	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<?php  
					if (isset($message)) 
						echo '<label class="alert">'.$message."</label>";
				?>
				<form method="post">
					<table class="table table-bordered">
						<tr>
							<td>Recovery Email<input type="email" name="u_email" class="u_email form-control"></td>
						</tr>
						
				
						<tr>
							<td><input type="submit" name="recover" value="Recover" class="btn btn-primary"></td>
						</tr>
					
					</table>
				</form>
			</div>
		</div>
	</div>
<?php include('admin/view/layouts/footer.php') ?>
