<?php 
include_once(__DIR__.'/Database.php');

class Validation extends Database {
	
	public static $instance;

	public $table="admin";

	public static function get_instance() {
		if(!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function required_validation($data) {
		$count = 0;
		foreach ($data as $key => $value) {
			
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

		$new = array("*");
		$query = $this->select($new,$data,$this->table);

		if(mysqli_num_rows($query)) {
			return true;
		} else {
			$this->error = "Invalid Username or Password";
		}
	}
}