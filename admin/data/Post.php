<?php 
include_once(__dir__.'/Database.php');
include_once(__DIR__.'/../controller/Image.php');
include_once(__DIR__.'/../controller/Meta.php');



class Post extends Database {
	public $table = 'post';

	public function add($data) {

		$result = $this->insert($data,$this->table);
		return $result;
		
	}

	public function select_id_for_meta($data) {
		$new = array("id");
		$result = $this->select($new,$data,$this->table);
		return $result;
		
	}

	public function delete_post($data) {
		$result = $this->delete($data,$this->table);
		return $result;
	}

	public function select_data($data) {
		$new = array('*');
		$result = $this->select($new,$data,$this->table);
		return $result;

	}
	public function update_post($data,$id) {
		$result = $this->update($data,$id,$this->table);
		return $result;
	}

	// public function front_show() {
	// 	$result = $this->show_post($this->table,3,3);
	// 	return $result;
	// }

	public function fetch($query) {
		$result = $this->rows_show($query);
		return $result;
	}

	public function paginate() {
		$result = $this->for_pagination($this->table);
		return $result;
	}

	public function show_data($limit,$data) {
		$result = $this->show_post($this->table,$limit,$data);
		return $result;
	}
}