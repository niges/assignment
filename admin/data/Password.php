 <?php 

include_once(__DIR__.'/Database.php');

class password extends Database {

	public $table = 'admin';
	public $message;

	public function update_password($data) {

		// $result = $this->update($data,$id="",$this->table);
		// return $result;

		if ($this->update($data,$id="",$this->table)) {
			$this->message = "Password Changed";
			return true;
		} 
	}

	public function check_old_password($opassword) {

		$opassword1 = md5($opassword);
		
		$sql = "SELECT password FROM " .$this->table . " WHERE password=" . "'$opassword1'";
		$query = mysqli_query($this->connection,$sql);
		$result = mysqli_num_rows($query);
		if ($result == false) {
			$this->message = "Password Not Matched";
		}
		return $result;
		
	}
	

}