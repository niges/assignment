<?php 
include_once(__dir__.'/Database.php');

class SiteConfiguration extends Database {
	public $table = 'settings';
	public $error;

	public function update_data($data) {
		
		if($this->update($data,$id='',$this->table)) {
			$this->error = "Updated";
			return true;
		} else {
			return false;
		}

	}

}

$siteconfiguration = new SiteConfiguration();

 ?>