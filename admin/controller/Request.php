<?php
include_once(__dir__.'/../data/Request.php');
include_once(__DIR__.'/../controller/Phpmailer.php');

if (isset($_POST['submit'])) {

	if (isset($_POST['fname'])) {
		$name = $_POST['fname'];	
	} 

	if (isset($_POST['lname'])) {
		$lname = $_POST['lname'];
	}

	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	}

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}

	if (isset($_POST['address1'])) {
		$address1=$_POST['address1'];
	}

	if (isset($_POST['address2'])) {
		$address2=$_POST['address2'];
	}

	if (isset($_POST['country'])) {
		$country=$_POST['country'];
	}

	if (isset($_POST['state'])) {
		$state=$_POST['state'];
	}

	if (isset($_POST['city'])) {
		$city=$_POST['city'];
	}

	if (isset($_POST['postal'])) {
		$postal=$_POST['postal'];
	}

	if (isset($_POST['date'])) {
		$date=$_POST['date'];
	}

	if (!empty($_POST['contact'])) {
		$contact = implode(",", $_POST['contact']);
	} else {
		$contact = 'null';
	}

	if (isset($_POST['gender'])) {
		$gender=$_POST['gender'];
	}

	if (isset($_POST['multiple'])) {
		$multiple = implode(",", $_POST['multiple']);	
	} else {
		$multiple = 'null';
	}

	if (isset($_POST['other'])) {
		$other=$_POST['other'];
	}
	if (!empty($_POST['email-alternative'])) {
		echo ' You are a robot';
	} else {
		$phpmails->request_send($name,$email,$multiple,$phone);
		echo 'Email Send Successfully';
	}
	
	
	
}




