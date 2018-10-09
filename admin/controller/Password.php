<?php 
include_once('Database.php');

class password extends Database {

	public function update_password($data) {
		$condition = "";
		foreach ($data as $key => $value) {
			$condition .= $key . '=' . "'$value'". ",";
		}
		$condition=rtrim($condition,',');
		$sql = "UPDATE " .$this->table . " SET " . $condition ;
	
		$query = mysqli_query($this->connection,$sql);
		return $query;
	}

	public function checkOldPassword($opassword) {
		$sql = "SELECT password FROM " .$this->table . " WHERE password=" . "'$opassword'";

		$query = mysqli_query($this->connection,$sql);
	
		$result = mysqli_num_rows($query);
		return $result;
		
	}
	

}

$passwordchange = new Password();

if (isset($_POST['change'])) {
	$email = $_POST['email'];
	$opassword = $_POST['opassword'];
	$npassword = $_POST['npassword'];
	if (!empty($email) && !empty($opassword) && !empty($npassword)) {
		if( $passwordchange->checkOldPassword($opassword) == true ) {

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