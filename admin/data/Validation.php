<?php 
include_once(__DIR__.'/../controller/Database.php');



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