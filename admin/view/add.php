<?php

include(__DIR__.'/layouts/header.php');
include(__DIR__.'/Dashboard.php');
include(__DIR__.'/../controller/Crud.php');

?>


	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php  
					if (isset($alert)) 
						echo '<label class="alert">'.$alert."</label>";
				?>
				<div class="well" id="error">
					
			
				<form method="post" name="pageform" id="add" enctype="multipart/form-data">
					<table class="table table-bordered">
						<tr>
							<td>Title:<input type="text" name="title" class="form-control"></td>
						</tr>
						<tr>
							<td>Body:<textarea name="body" rows="10" cols="100" class="form-control ckeditor"></textarea></td>
						</tr>
						<tr>
							<td>
								<select class="form-control" name="page">
									<option value='-1'>
										None
									</option>
									<?php
									$title = $crud->show_parent();
									foreach ($title as $key => $value) {
										
									?>

									<option value="<?php echo $value['id'] ?>">
										<?php echo $value['title']; ?>
									</option>

									<?php } ?>

									<option value= '-2'>
										Add in Foter
									</option>
								</select>
	
							</td>
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
	</div>
	
<?php include_once('layouts/footer.php') ?>
