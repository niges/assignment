<?php 

include_once(__DIR__.'/Database.php');
include_once(__DIR__.'/../controller/Meta.php');


class Image extends Database {

	public $table = "images";


	public function selectid($data) {

 		$database = new Database();
		// $result = $database->id_select($data,$this->table);

		$new = array("id");
		$result = $database->select2($new,$data,$this->table);

		return $result;
 	}



	public function add_image($data) {
		
		$database = new Database();
		$database->insert($data,$this->table);

	}


	public function show_images() { //ok
		
		$database = new Database();
		$result = $database->show($this->table);
		return $result;	
		
	}

	public function delete_image($data) { //ok

		foreach ($data as $key => $value) {
			$condition = $key . '=' .$value;
		}
		// $condition = $this->condition_fe($data);
		
		// $selectphoto = "SELECT image FROM ". $this->table . " WHERE " . $condition;

		// $query = mysqli_query($this->connection,$selectphoto);
		// $result = mysqli_fetch_array($query);

		// foreach ($result as $field) {
		// 	$name = $field;
			
		// }
	


		// // return $name;
	

		$database = new Database();
		$image = $database->image_select($data,$this->table);

		// if ($image) {
		// 	unlink("../static/upload/" . $image);
		// }
		
		$result = $database->delete($data,$this->table);
		return $result;

	}

	//only_Selected for show images

	public function only_selected($data) { //ok

		
		$database = new Database();
		$result = $database->image_select($data,$this->table);
	
		return $result;


	}

	
	
}


