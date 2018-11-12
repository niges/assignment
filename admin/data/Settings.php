<?php 

include_once(__DIR__.'/Database.php');

class Settings extends Database {

	public $table="settings";


	public function setting() {
		
		$new = array("*");
		$result = $this->select($new,$data=0,$this->table);
		$new = $this->rows_show($result);
		foreach ($new as $key => $value) {
			 $GLOBALS['server_root'] = $value['server_root'];
			 $GLOBALS['logo'] = $value['logo'];
			 $GLOBALS['site_name'] =  $value['site_name'];
			 $GLOBALS['footer'] = $value['footer'];
			 $GLOBALS['page_no'] = $value['pagination'];
			
		}
		return $result;
	}

}
$settings = new Settings();


