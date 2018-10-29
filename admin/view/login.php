
<?php

include_once(__DIR__.'/layouts/header.php');
include(__DIR__.'/../Controller/validation.php');
include_once(__DIR__.'/../data/Settings.php')

?>
	<div class="container">
		<div class="row" id="head">
			<div class="col-md-10">
				<?php  
					if (isset($message)) 
						echo '<label class="alert">'.$message."</label>";
				?>
				<form method="post" name="form" id="login"">

					<table class="table table-bordered">
						<tr>
							<td>Email:<input type="email" name="u_email" class="form-control"  value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"></td>
						</tr>
						<tr>
							<td>password:<input type="password" name="password" class="form-control" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"</td>
						</tr>
						<tr>
							<td>Remember Me: <input type="checkbox" name="remember"></td>
						</tr>
						<tr>
							<td>
								<?php 
								$url = $settings->Setting();

								foreach ($url as $key => $value) {
									
								} 

								?>
							<a href="<?php echo $value['server_root']; ?>forget.php">Forget password</a></td>
						</tr>

						<tr>
							<td><input type="submit" name="login" id="submit" value="Login" class="btn btn-primary"></td>
						</tr>
					
					</table>
				</form>
			</div>
		</div>
	</div>
<?php
include('layouts/footer.php');
?>
