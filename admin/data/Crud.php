<?php 

include_once(__DIR__.'/Database.php');
include_once(__DIR__.'/../controller/Image.php');
include_once(__DIR__.'/../controller/Meta.php');


 class Crud extends Database {

 	public $table1 = "page";
 	public $error;


 	public function verify_add($data) { //ok

		$database = new Database();
		$result = $database->insert($data,$this->table1);
		return $result;

	}

	public function show_data() { //ok
		
		$database = new Database();
		$result = $database->show($this->table1);
		return $result;
		
	}

	//for edit
	public function select_data($id) {



		// foreach ($id as $key => $value) {
		// 	$condition = $key . "=" . "'$value'";
				
		// }
		// $sql =	"select * from " .$this->table1 . " where " .$condition;

		// $query = mysqli_query($this->connection,$sql);
		
		// $rows = mysqli_fetch_array($query);

		// return $rows; 


		$database = new Database();
		$data=['*'];
		$result = $database->select2($data,$id,$this->table1);
		return $result;
		// $new = array("*");
		// $result = $database->select1($id,$new,$this->table1);
		// return $result;

	}

	public function delete_data($did) { //ok
		

		$database = new Database();
		$database->delete($did,$this->table1);
	
		

	}

	public function update_data($data,$id) {
		//UPDATE INTO TABLENAME SET NAME = 'VALUE' WHERE ID=1;
		// foreach ($data as $key => $value) {
		// 	$condition = $key . '=' . "'$value'";
		// }
		// foreach ($id as $eid) {
		// 	$uip = $eid;
		// 	# code...
		// }
		// $sql = "UPDATE " . $this->table1 . " SET " . $condition . " WHERE id=" . $eid;

		// $query = mysqli_query($this->connection , $sql);

		// return $query;

		$database = new Database();
		$result = $database->update($data,$id,$this->table1);
		return $result;
		
	}

	public function select_id_for_meta($data) {


		$database = new Database();
		// $result = $database->id_select($data,$this->table1);
		// return $result;

		$new = array("id");
		$result = $database->select2($new,$data,$this->table1);
		return $result;
		
	 }
 }


