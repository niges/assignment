<?php
include_once(__dir__.'/../data/Subscribe.php'); 

$subscribe = new Subscribe();

if (isset($_POST['subscribe'])) {
	$data = array('email' => $_POST['email']);
	$subscribe_check = $subscribe->check($data);

	if(mysqli_num_rows($subscribe_check)>=1) {
		$message ='You have already subscribed';
	} else {
		$new = array(
				'email' => $_POST['email'],
				'date' => date('Y-m-d H:i:s')
				);
		if($subscribe->add($new)) {
			$message= "Email Subscribed Successfully";
		}
	}
}

if (isset($_GET['delete'])) {
	if($subscribe->delete_subscribers($_GET['id'])) {
		$message = 'Subscriber Deleted Successfully';

	}
}

if (isset($_GET['export'])) {
	$subscribe->export_xls();
}

 ?>