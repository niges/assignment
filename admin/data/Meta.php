<?php 
include_once(__DIR__.'/Database.php');
include_once(__DIR__.'/../controller/Crud.php');
include_once(__DIR__.'/../controller/Image.php');

class Meta extends Database {

	public $table = "meta";


	public function insert_metadata($metadata) {

		// $condition = '';
		// 	foreach ($metadata as $key => $value) {
		// 		$condition .= $key . '=' . "'$value'" . ',';
		// 	}
		// 	$condition = rtrim($condition, ',');

		// 	$sql = "Insert into " . $this->table . ' SET ' . $condition;
		// 	$query = mysqli_query($this->connection,$sql);
		// 	return $query;


		$database = new Database();
		$result = $database->insert($metadata,$this->table);
		return $result;
	}

	//check images in the meta table

	public function check_images($id) {

		// $database = new Database();

		// $data=array(
		// 	'image'
		// );

		// $database->select2($data,$id,$this->table);
		foreach ($id as $key => $value) {

			$condition = $key . '=' . "'$value'";

		}

		$sql = "SELECT images_id from " . $this->table . " WHERE " .$condition;
		$query = mysqli_query($this->connection,$sql);

		$rows = array();

		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}

		return $rows;
		

		$database = new Database();
		$result = $database->rows_show($query);	
		return $result;
		
		// $database = new Database();
		// $new = array("images_id");
		// $result = $database->select($id,$new,$this->table);
		// return $result;

	}

	public function selectPageId($ndata) {

		$sql = "SELECT page_id FROM " .$this->table . " WHERE images_id=" .$ndata;
		$query = mysqli_query($this->connection,$sql);

		/*

		// $rows = array();
		// while ($row = mysqli_fetch_assoc($query)) {
		// 	$rows[] = $row;
		// }
		
		// return $rows;
		*/

		$database = new Database();
		$result = $database->rows_show($query);	
		return $result;


	}

}




