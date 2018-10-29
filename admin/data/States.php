<?php 
include_once(__DIR__.'/Database.php');

Class States extends Database{

	public $table = 'states';

	public function show_state(){
		
		if (!empty($_GET['id'])) {
			$new = array('country_id'=>$_GET['id']);
			$data = array('*');
			$result = $this->select($data,$new,$this->table);
			echo  "<option>Select State</option>";
			foreach ($result as $key => $value) {
				
				echo  "<option>".$value['name']."</option>";
			}

		}
	}
}
$states = new States();
$states->show_state();

