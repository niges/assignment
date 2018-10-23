<?php 

include_once(__DIR__.'/layouts/header.php');
include_once(__DIR__.'/dashboard.php');
include_once(__DIR__.'/../controller/Password.php');

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
							<td>Email:<input type="email" name="email" class="form-control"></td>
						</tr>
						<tr>
							<td>Old password:<input type="password" name="opassword" class="form-control"></td>
						</tr>
						<tr>
							<td>New password:<input type="password" name="npassword" class="form-control"></td>
						</tr>
					
						

						<tr>
							<td><input type="submit" name="change" value="Change Password" class="btn btn-primary"></td>
						</tr>
					
					</table>
				</form>
			</div>
		</div>
	</div>
<?php include('layouts/footer.php'); ?>
