<?php 

include_once(__DIR__.'/Database.php');
include_once(__DIR__.'/../controller/Phpmailer.php');



class Recover extends Database {
	public $row;
	public $error;
	public $table = 'admin';

	public function recover_email($data) {
	
		$new = array("email");
		$query = $this->select($new,$data,$this->table);

		if (mysqli_num_rows($query)) {
			
			function generate_random_string($length = 10) {
			    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $charactersLength = strlen($characters);
			    $randomString = '';
			    for ($i = 0; $i < $length; $i++) {
			        $randomString .= $characters[rand(0, $charactersLength - 1)];
			    }
			   
			    return $randomString;
			} 
			// $mail = mail("nigesh111@gmail.com", "hello", "hello");
			$data = generate_random_string();

			$phpmailers = new Phpmailers();

			$phpmailers->send_mail($data);

			$database = new Database();
			// $pw = hash_hmac('sha256', 'salt' .generate_random_string() , 'helloworld');
			$pw = md5($data);
			$datapassword = array('password' => $pw);
			$result = $database->update($datapassword,$id='',$this->table);
			echo "password Send To the Email";
		} else {
			$this->error = "Invalid Email";
		}
		
	}
	


}