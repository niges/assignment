<?php 

include_once('../controller/Session.php');
include_once('layouts/header.php');
// include_once('../data/Session.php');

// echo "Welcome " . $_SESSION['email']."<br>";

// s
 ?>

 <body>
 	<div class="container">
 		<div class="row">
 			<div class="col-md-8">
 				<a href="http://localhost/newassign/admin/view/page-manager.php" class="btn btn-primary">Page Manager</a>
 				<a href="http://localhost/newassign/admin/view/admin-manager.php" class="btn btn-primary">Admin Manager</a>
 				<a href="http://localhost/newassign/admin/view/image-manager.php" class="btn btn-primary">Image Manager</a>
 				<a href="http://localhost/newassign/admin/view/logout.php" class="btn btn-primary">Logout</a>
 			</div>
 		</div>
 	</div>
<?php include_once('layouts/footer.php');