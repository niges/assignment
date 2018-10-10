<?php 

include_once(__DIR__.'/../controller/Database.php');

class Recover extends Database {
	public $row;

	public function recover_email($data) {
		foreach ($data as $key => $value) {
			# code...
			$condition = $key. '=' . "'$value'";
		}

		$sql = "select password from ".$this->table." where " . $condition;
		

		$query = mysqli_query($this->connection,$sql);
		

		

		if (mysqli_num_rows($query)) {
			
			$rows = array();
			while($password = mysqli_fetch_array($query)) {
				$rows = $password;
			}

			foreach ($rows as $key => $value) {
					$pass = $value;
			}
			echo "You password is: ". $pass;

		} else {
			$this->error = "Invalid Email";
		}
		
	}
	


}