<?php 

include_once(__DIR__.'/../controller/Database.php');
include_once(__DIR__.'/../controller/Meta.php');


class Image extends Database {

	public $table = "images";


	public function selectid($data) {
 		foreach ($data as $key => $value) {
 			$condition = $key . '=' ."'$value'";
 		}
 		$sql = "SELECT id FROM " .$this->table . " WHERE " . $condition;
 
 		$query = mysqli_query($this->connection,$sql);
 		$rows = array();
 		while($row = mysqli_fetch_assoc($query)) {
 			$rows[] = $row;
 		}
 		return $rows;
 		
 	}



	public function add_image($data) {
		$condition = "";
		foreach ($data as $key => $value) {
			$condition .= $key . '=' . "'$value'" . ',';
			
			# code...
		}
		$condition =rtrim($condition,',');
		$sql = "INSERT INTO ". $this->table . " SET " . $condition;
		$result = mysqli_query($this->connection,$sql);

		



	}

	public function show_images() {
		//select * from tablename 
		$sql = "select * from " .$this->table;

		$query = mysqli_query($this->connection,$sql);

		$rows = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;

		
		
	}
	public function delete_image($data) {
		foreach ($data as $key => $value) {
			$condition = $key . '=' .$value;
		}
		
		$selectphoto = "SELECT image FROM ". $this->table . " WHERE " . $condition;
		$query = mysqli_query($this->connection,$selectphoto);
		$result = mysqli_fetch_array($query);


		foreach ($result as $field) {
			$name = $field;
			
		}

		$sql = "DELETE FROM " .$this->table . " WHERE " . $condition;
		
		$query = mysqli_query($this->connection,$sql);	
		// if ($query == true) {
		// 	unlink("../static/upload/" . $name);
			
		// }
		


		return $query;	
	}
	//only_Selected for show images

	public function only_selected($data) {

		foreach ($data as $key => $value) {
			$condition = $key . '=' . $value;
		}
		
		$sql = "SELECT image,id from " .$this->table . " WHERE " .$condition ;

		$query = mysqli_query($this->connection,$sql);


		$rows = array();
		while($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;


	}

	
	
}