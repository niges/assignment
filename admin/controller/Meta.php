<?php 
include_once(__DIR__.'/Database.php');
include_once(__DIR__.'/Crud.php');
include_once(__DIR__.'/Image.php');

class Meta extends Database {

	public $table = "meta";


	public function insert_metadata($metadata) {
			$condition = '';
			foreach ($metadata as $key => $value) {
				$condition .= $key . '=' . "'$value'" . ',';
			}
			$condition = rtrim($condition, ',');

			$sql = "Insert into " . $this->table . ' SET ' . $condition;

			$query = mysqli_query($this->connection,$sql);
	}
	//check images in the meta table

	public function check_images($id) {

			foreach ($id as $key => $value) {

				$condition = $key . '=' . "'$value'";

			}

			$sql = "SELECT images_id from " . $this->table . " WHERE " .$condition;
			
			$query = mysqli_query($this->connection,$sql);

			$rows = array();
			while ($row = mysqli_fetch_array($query)) {
				$rows[] = $row;
			}
			return $rows;	

	}
	public function selectPageId($ndata) {
		$sql = "SELECT page_id FROM " .$this->table . " WHERE images_id=" .$ndata;
		$query = mysqli_query($this->connection,$sql);

		$rows = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		
		return $rows;


	}

	}
$meta = new Meta();



