 <?php 

include_once(__DIR__.'/Database.php');

class password extends Database {

	public $table = 'admin';

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

	public function check_old_password($opassword) {
		$sql = "SELECT password FROM " .$this->table . " WHERE password=" . "'$opassword'";

		$query = mysqli_query($this->connection,$sql);
	
		$result = mysqli_num_rows($query);
		return $result;
		
	}
	

}