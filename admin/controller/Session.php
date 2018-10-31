<?php 
include_once('Validation.php');

if(!$_SESSION['email']) {
	header("location:http://localhost/newassign/admin/login.php");
}

?>