<!DOCTYPE html>
<?php
include('admin/controller/validation.php');
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
							<td>Email:<input type="email" name="u_email" class="u_email form-control" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"</td>
						</tr>
						<tr>
							<td>password:<input type="password" name="password" class="password form-control" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"</td>
						</tr>
						<tr>
							<td>Remember Me: <input type="checkbox" name="remember"></td>
						</tr>
						<tr>
							<td><a href="forget.php">Forget password</a></td>
						</tr>

						<tr>
							<td><input type="submit" name="login" value="Login" class="btn btn-primary"></td>
						</tr>
					
					</table>
				</form>
			</div>
		</div>
	</div>
<?php
include('admin/view/layouts/footer.php');
?>
