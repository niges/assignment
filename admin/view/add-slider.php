<?php

include(__DIR__.'/layouts/header.php');
include(__DIR__.'/Dashboard.php');
include_once(__DIR__.'/../controller/Slider.php');



?>
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h4>Add Post</h4>
				<?php  
					if (isset($alert)) 
						echo '<label class="alert">'.$alert."</label>";
				?>
				<div class="well" id="error">
					
			
				<form method="post" enctype="multipart/form-data">
					<table class="table table-bordered">
						<tr>
							<td>Title:<input type="text" name="title" class="form-control" required></td>
						</tr>
						<tr>
							<td>Content:<textarea name="content" rows="10" cols="100" class="form-control ckeditor" required="required"></textarea></td>
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
								<input type="submit" name="add-slider" value="Add" class="btn btn-success">
							</td>
						</tr>
						
					</table>
				</form>
			    </div>
			</div>
		</div>
	</div>


<?php include_once(__dir__.'/layouts/footer.php') ?>