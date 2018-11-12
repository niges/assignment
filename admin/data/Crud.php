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

	public function show_parent() {
		$data = array('parent_id' => -1);
		$new = array('*');
		$result = $this->select($new,$data,$this->table1);
		return $result;
	}
	
	public function dropdown_child($id) {
		$new = array('id','title','slug');
		$data = array('parent_id'=>$id);
		$query =$this->select($new,$data,$this->table1);
		$result = $this->rows_show($query);
		return $result;

	}

	public function create_url_slug($str) {
		$search = array('Ș', 'Ț', 'ş', 'ţ', 'Ş', 'Ţ', 'ș', 'ț', 'î', 'â', 'ă', 'Î', 'Â', 'Ă', 'ë', 'Ë');
		$replace = array('s', 't', 's', 't', 's', 't', 's', 't', 'i', 'a', 'a', 'i', 'a', 'a', 'e', 'E');
		$str = str_ireplace($search, $replace, strtolower(trim($str)));
		$str = preg_replace('/[^\w\d-\ ]/', '', $str);
		$str = str_replace(' ', '-', $str);
		$query = $this->slug_select($str,$this->table1);
		$result = $this->rows_show($query);

		if((mysqli_num_rows($query))) {
			foreach ($result as $key => $value) {
				$slugs[] = $value['slug'];	
			}
			if(in_array($str, $slugs)){
			    $count = 1;
			    do{
			       $testSlug = $str . '-' . $count;
			       $count++;
			    } while(in_array($testSlug, $slugs));
			    $str = $testSlug;
			    return preg_replace('/-{2,}/', '-', $str);
			}

		} else {

			return preg_replace('/-{2,}/', '-', $str);
		}
	}
	
	public function get_title($id) {
		$data = array('id' => $id);
		$new = array('slug');
		$query =$this->select($new,$data,$this->table1);
		$result = $this->rows_show($query);
		return $result;
	}

	public function show_footer() {
		$data = array('parent_id' => -2);
		$new = array('*');
		$result = $this->select($new,$data,$this->table1);
		return $result;
	}

}


