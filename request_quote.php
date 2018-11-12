<?php 

include_once(__dir__.'/admin/view/layouts/header.php');
include_once(__dir__.'/admin/view/layouts/head.php');
include_once(__dir__.'/admin/data/Request.php');
include_once(__dir__.'/admin/controller/Request.php');
include_once(__dir__.'/admin/data/States.php');
include_once(__dir__.'/header.php');

?>

<div clas="col-md-8 col-md-offset-10">
	<div class="col-md-7">
		<br>
		<h3 style="margin-left: 105px;">Request a Quote</h3>
		<form method="post" id="request" style="margin-top: 20px; margin-left: 105px;">
			<table class="table table-bordered">
				<tr>
					<td>First Name:<input type="text" name="fname" class="form-control"></td>
				</tr>
				<tr>
					<td>Last Name:<input type="text" name="lname" class="form-control"></td>
				</tr>
				<tr>
					<td>Phone:<input type="text" name="phone" class="form-control"></td>
				</tr>
				<tr class="email-block">
					<td>Email:<input type="text" name="email-spam" class="form-control"></td>
				</tr>
				<tr>
					<td>Email:<input type="text" name="email" class="form-control"></td>
				</tr>
				<tr>
					<td>Address 1:<input type="text" name="address1" class="form-control"></td>
				</tr>
				<tr>
					<td>Address 2:<input type="text" name="address2" class="form-control"></td>
				</tr>
				<tr>
					<td>Country:
			
						<select class="form-control" name='country' id='country-list' onchange="getCity(this.value);">
							<option value disabled selected>Select Country</option>
							<?php 
							$countries = $request->show_countries();
							foreach ($countries as $key => $value) {
							?>
							<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
							<?php } ?>
						</select>
						
					</td>
				</tr>
				<tr>
					<td>state:

						<select class="form-control" name='state' id='state'>
							
							<option value="">

								select city
							</option>
							
						</select>
					</td>
				</tr>
				<tr>
					<td>city:<input type="text" name="city" class="form-control"></td>
				</tr>
				<tr>
					<td>Postal code:<input type="text" name="postal" class="form-control"></td>
				</tr>
				<tr>
					<td>Date:<input type="date" name="date" class="form-control"></td>
				</tr>
				<tr>
					<td>Contact Me:
						Email:<input type="checkbox" name="contact[]" value="email">
						Phone:<input type="checkbox" name="contact[]" value="phone">
						Post:<input type="checkbox" name="contact[]" value="post">

					</td>
				</tr>
				<tr>
					<td>Gender:
						Female: <input type="radio" name="gender" value="Female">
						Male: <input type="radio" name="gender" value="Male">
					</td>
				</tr>
				<tr>
					<td>Services:
						<select multiple class="form-control" name="multiple[]">
							<option value="none">None</option>
							<option value="web">Web Designing</option>
							<option value="graphics">Graphics Designing</option>
							<option value="android">Android Application</option>
							<option value="gaming">Gaming</option>
						</select>

					</td>
				</tr>
				<tr>
					<td>Other:
						<textarea rows='10' cols='20' class='form-control' name="other"></textarea>
					</td>
				</tr>
				
				<tr>
					<td><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>

	</div>
</div>

<?php include_once(__dir__.'/admin/view/layouts/footer.php') ?>


