<?php 
include_once(__dir__.'/Phpmailer.php');
require_once(__dir__.'/../data/Settings.php');

if (isset($_POST['contact'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$phpmails->contact($name,$email,$phone,$message);
	header("location:".$server_root."/success.php");

}