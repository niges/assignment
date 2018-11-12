<?php 
include_once(__dir__.'/Database.php');

class Slider extends Database {

	public $table = 'slider';

	public function insert_data($data) {

		$result = $this->insert($data,$this->table);
		return $result;
	}

	public function select_id_for_meta($data) {

		$new = array("id");
		$result = $this->select($new,$data,$this->table);
		return $result;
		
	}

	public function show_data() {

		$result = $this->show($this->table);
		return $result;
	}

	public function select_data($data) {
		$new = array('*');
		$result = $this->select($new,$data,$this->table);
		return $result;

	}

	public function delete_slider($data) {
		$result = $this->delete($data,$this->table);
		return $result;
	}

	public function update_slider($data,$id) {
		$result = $this->update($data,$id,$this->table);
		return $result;
	}

	public function check_images($id) {

		$new = array("image");
		$query = $this->select($new,$id,$this->table);
		$result = $this->rows_show($query);	
		return $result;

	}

	public function select_image($data) {
		$new = array('*');
		$result = $this->select($new,$data,$this->table);
		return $result;
	}
}