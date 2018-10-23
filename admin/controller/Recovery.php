<?php 

include_once(__DIR__.'/../data/Recovery.php');

$recovery = new Recover();

if (isset($_POST['recover'])) {
	$data = array(
		'email' => $_POST['u_email']
	);

	$recovery->recover_email($data);	
}else {
		$message = $recovery->error;
}



