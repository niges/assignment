<?php 

include_once(__DIR__.'/Database.php');

class Settings extends Database {

	public $table="settings";

	public function setting() {

		$new = array("*");
		$result = $this->select($new,$data=0,$this->table);
		return $result;
	}

}
$settings = new Settings();


