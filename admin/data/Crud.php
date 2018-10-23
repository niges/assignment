<?php 

include_once(__DIR__.'/Database.php');
include_once(__DIR__.'/../controller/Image.php');
include_once(__DIR__.'/../controller/Meta.php');


 class Crud extends Database {

 	public $table1 = "page";
 	public $error;

 	public function verify_add($data) { 

		$result = $this->insert($data,$this->table1);
		return $result;

	}

	public function show_data() { 
	
		$result = $this->show($this->table1);
		return $result;
		
	}

	//for edit
	public function select_data($id) {

		$data=['*'];
		$result = $this->select($data,$id,$this->table1);
		return $result;

	}

	public function delete_data($did) { 
		
		$this->delete($did,$this->table1);

	}

	public function update_data($data,$id) {

		$result = $this->update($data,$id,$this->table1);
		return $result;
		
	}

	public function select_id_for_meta($data) {

		$new = array("id");
		$result = $this->select($new,$data,$this->table1);
		return $result;
		
	}
 }


