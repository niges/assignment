<?php 

include(__DIR__.'/layouts/header.php');
include(__DIR__.'/Dashboard.php');
include_once(__DIR__.'/../Controller/Subscribe.php');
include_once(__DIR__.'/../data/Settings.php');


?>
<br>
<div class="container">
 	<div class="row">
 		<div class="col-md-8">

 			<?php  
				if (isset($message)) 
					echo '<label class="success">'.$message."</label>";
			?>
 			<h4>List of Subscribers</h4>
 			<br>
 			<a href="?export=1" class="btn btn-large btn-success">Export to Excel</a>
 			<br><br>
 			<table class="table table-bordered">
 				
 				<tr>
 					<td>Id</td>
 					<td>Subscribers</td>
 					<td></td>
 				</tr>
 				<?php 
 					$data = $subscribe->show_data();
 					foreach ($data as $key => $value) {
 						
 					
 				 ?>
 				<tr>
 					<td><?php echo $value['id']?></td>
 					<td><?php echo $value['email']?></td>
 					<td><a href="?delete=1&id=<?php echo $value['id'] ?>" class="btn btn-danger">Delete</a></td>
 				</tr>
 				<?php } ?>
 				
 				
 		
 			</table>


 		</div>
 	</div>
 </div>

<?php include_once('layouts/footer.php') ?>