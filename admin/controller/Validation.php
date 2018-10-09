<?php 
include('Database.php');

class Validation extends Database {

		public static function get_instance() {
			if(!self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		public function required_validation($data) {
		$count = 0;
			foreach ($data as $key => $value) {
				# code...
				
				if (empty($value)) {
					$count++;
					$this->error =  "<p> Alert:".$key. " required </p>";
				} 
			}
			if ($count == 0) {
				return true;
			}
		

		}

		public function data_validation($data) {
			$condition = '';

			foreach ($data as $key => $value) {
				$condition .= $key . " = '".$value."' AND ";
			}
			$condition = substr($condition, 0,-5);

			$sql = "select * from " . $this->table . " where " . $condition;

			$query = mysqli_query($this->connection,$sql);

				if(mysqli_num_rows($query)) {
					return true;
				} else {
					$this->error = "Invalid Username or Password";
				}
		}

}
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
			header("Location:admin/view/dashboard.php");
		} else {
					$message = $validation->error;
		}
				
	} else {
		$message = $validation->error;
	
	}

	

}


