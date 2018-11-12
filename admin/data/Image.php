<?php 

include_once(__DIR__.'/Database.php');
include_once(__DIR__.'/../controller/Meta.php');


class Image extends Database {

	public $table = "images";

	public function selectid($data) {

		$new = array("id");
		$result = $this->select($new,$data,$this->table);

		return $result;
 	}

	public function add_image($data) {
		
		$this->insert($data,$this->table);

	}


	public function show_images() { 
		
		$result = $this->show($this->table);
		return $result;	
		
	}

	public function delete_image($data) {

		foreach ($data as $key => $value) {
			$condition = $key . '=' .$value;
		}

		$image = $this->image_select($data,$this->table); 
		foreach ($image as $key => $value) {
			
		}

		if ($image==true) {
			unlink("../static/upload/" . $value['image']);
			unlink("../static/upload/crop/" . $value['crop']);

		}
		
		$result = $this->delete($data,$this->table);
		return $result;

	}

	//only_Selected for show images

	public function only_selected($data) { 

		$result = $this->image_select($data,$this->table);
	
		return $result;
	}

	public function select_image($data) {
		$new = array('*');
		$result = $this->select($new,$data,$this->table);
		return $result;
	}

}


