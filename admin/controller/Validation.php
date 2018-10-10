<?php 

include_once(__DIR__.'/../data/Validation.php');

$validation = new Validation();
$message ="";
session_start();

if (isset($_POST['login'])) {
	$username =mysqli_real_escape_string(Validation::get_instance()->connection, trim($_POST['u_email']));
	$password = mysqli_real_escape_string(Validation::get_instance()->connection,trim($_POST['password']));

	if (!empty($_POST['remember'])) {
		setcookie("email", $username, time() + (10*365*24*60*60));
		setcookie("password", $password, time()+ (10*365*24*60*60));
		echo "Cookies Created";
	} else {
			setcookie("email","");
			setcookie("password","");
		
	}

	
	$data =array( 
		'email' => $username,
		'password' => $password
		);
	
	if($validation->required_validation($data)) {
		if($validation->data_validation($data)) {
			$_SESSION['email'] = $_POST['u_email'];
			header("Location:dashboard.php");
		} else {
					$message = $validation->error;
		}
				
	} else {
		$message = $validation->error;
	
	}

	

}


