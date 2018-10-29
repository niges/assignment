<?php
include_once(__dir__.'/layouts/header.php');
include_once(__dir__.'/dashboard.php');
include_once(__dir__.'/../data/Settings.php');
include_once(__dir__.'/../controller/SiteConfiguration.php');

?>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php  
					if (isset($message)) 
						echo '<label class="well">'.$message."</label>";
			?>
				<form method="post" enctype="multipart/form-data">
					<?php 
						$urlsettings = $settings->Setting();
						foreach ($urlsettings as $key => $url) {
							
					?>
					<table class="table table-bordered">
						<tr>
							<td>Logo Upload:</td>
						</tr>		
						<tr>
							<td> 
								<div class="input-group-append">
									<span class="input-group-text" id=""><input type="file" name="file"></span>
									<img src="<?php echo $url['server_root'] ?>admin/static/upload/<?php echo $url['logo'] ?>">
    								
 								 </div>
 							</td>
 						</tr>
					
					</table>
					
					<p>Site Name:<input type="text" name="sitename" value="<?php echo $url['site_name'];  ?>" class="form-control"></p>

					<p>Site URL:<input type="text" name="siteurl"  value="<?php echo $url['server_root'];  ?>" class="form-control"></p>
	
					<p>Footer Text:<input type="text" name="footer" value="<?php echo $url['footer'];  ?>"  class="form-control"></p>

					<input type="submit" name="update" value="update" class="btn btn-success">
				</form>
					<?php } ?>
		</div>
	</div>
</div>

<?php include_once(__dir__.'/layouts/footer.php'); ?>