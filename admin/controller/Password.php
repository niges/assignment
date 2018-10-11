 <?php 

require_once(__dir__.'/../data/Password.php');


$passwordchange = new Password();

if (isset($_POST['change'])) {
	$email = $_POST['email'];
	$opassword = $_POST['opassword'];
	$npassword = $_POST['npassword'];
	if (!empty($email) && !empty($opassword) && !empty($npassword)) {
		if( $passwordchange->check_old_password($opassword) == true ) {

				$data = array(
				'email' => $email,
				'password' => $npassword,
				);
		
			if($passwordchange->update_password($data)) {
			
				echo "password changed";
			}
		
		} else {
		echo "Old password not matched";
	}

	} else {
		echo "Empty password";
	}

 

	
}