<?php 
$title = 'Contact Us';
include_once(__dir__.'/admin/view/layouts/header.php');
include_once(__dir__.'/admin/view/layouts/head.php');
include_once(__dir__.'/header.php');
include_once(__dir__.'/admin/controller/Contact.php');

?>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h4>Contact us</h4>
			<form method="post" id="contact">
				<table class="table table-bordered">
					<tr>
						<td>Name:<input type="text" name="name" class="form form-control" required></td>
					</tr>
					<tr>
						<td>Email:<input type="email" name="email" class="form form-control" required></td>
					</tr>
					<tr>
						<td>Phone:<input type="number" name="phone" class="form form-control"></td>
					</tr>
					<tr>
						<td>Messages:<textarea name="message" cols="100" rows="10" class="form form-control"></textarea></td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="contact" value="Submit" class="btn btn-lg btn-primary">
						</td>
					</tr>
				</table>
			</form>
			
		</div>
	</div>
</div>

<?php include('admin/view/layouts/footer.php') ?>