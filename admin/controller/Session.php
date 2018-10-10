<?php 
include_once('Validation.php');


if(!$_SESSION['email']) {
	header("location:admin/view/login.php");
	
}

 ?>