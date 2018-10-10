<?php 

include_once(__DIR__.'/../controller/Database.php');

class Settings extends Database {

	public function setting() {

		$sql = " Select server_root from settings";
		$query = mysqli_query($this->connection,$sql);
		$rows = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		
		return $rows;
		
	}

}
$settings = new Settings();


