<?php 
include_once(__DIR__.'/Database.php');
include_once(__DIR__.'/../controller/Crud.php');
include_once(__DIR__.'/../controller/Image.php');

class Meta extends Database {

	public $table = "meta";

	public function insert_metadata($metadata) {

		$result = $this->insert($metadata,$this->table);
		return $result;
	}

	//check images in the meta table

	public function check_images($id) {

		$new = array("images_id");
		$query = $this->select($new,$id,$this->table);
		$result = $this->rows_show($query);	
		return $result;

	}

	public function selectPageId($ndata) {

		$sql = "SELECT page_id FROM " .$this->table . " WHERE images_id=" .$ndata;
		$query = mysqli_query($this->connection,$sql);
		$result = $this->rows_show($query);	
		return $result;
	}

}




