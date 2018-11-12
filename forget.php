
<?php
$title = 'Forget';
include_once(__dir__.'/admin/data/Settings.php');
include_once(__dir__.'/admin/controller/Recovery.php');
include_once(__dir__.'/admin/view/layouts/header.php');
include_once(__dir__.'/admin/view/layouts/head.php');

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

