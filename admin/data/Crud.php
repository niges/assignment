<?php 

include_once(__DIR__.'/../controller/Database.php');
include_once(__DIR__.'/../controller/Image.php');
include_once(__DIR__.'/../controller/Meta.php');


 class Crud extends Database {

 	public $table1 = "page";


 	public function verify_add($data) {
		
		$condition = '';
		$nextcondition = '';

		foreach ($data as $key => $value) {
			$condition .= " " . $key . ',' ;
			$nextcondition .= " " . "'$value'" . ',';
			
			
		}
		
		$condition =rtrim($condition , ',');
		$nextcondition = rtrim($nextcondition , ',');
		$sql = "INSERT INTO " .$this->table1 ."(" . $condition .")" ." ". "VALUES(" .$nextcondition .")";
		


		$query = mysqli_query($this->connection,$sql);
		

		if($query) {
			return true;
		} else {
			$this->error = "Invalid Data";
		}

	}

	public function show_data() {
		$sql = "select * from ". $this->table1 ;
		$query = mysqli_query($this->connection,$sql);
		$rows = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;


	}
	//for edit
	public function select_data($id) {
		foreach ($id as $key => $value) {
			$condition = $key . "=" . "'$value'";
				
		}
		$sql =	"select * from " .$this->table1 . " where " .$condition;

		$query = mysqli_query($this->connection,$sql);
		
		$rows = mysqli_fetch_array($query);

		return $rows;
		

	}
	public function delete_data($did) {
		
		foreach ($did as $key => $value) {
			$condition =  $key . "=" . "'$value'"; 
		}

		$condition1 = "SELECT image  from  images " . " where id=" . "'$value'";

		$query1 = mysqli_query($this->connection,$condition1);
		$rows = array();
		while ($row = mysqli_fetch_assoc($query1)) {
			$rows[] = $row;
		}
		
	
		$sql = "Delete from ".$this->table1. " where " . $condition;
		$query = mysqli_query($this->connection,$sql);
		return $rows;
		

		
		


		
		

	}

	public function update_data($data,$id) {
			//UPDATE INTO TABLENAME SET NAME = 'VALUE' WHERE ID=1;
		foreach ($data as $key => $value) {
			$condition = $key . '=' . "'$value'";
		}
		foreach ($id as $eid) {
			$uip = $eid;
			# code...
		}
		$sql = "UPDATE " . $this->table1 . " SET " . $condition . " WHERE id=" . $eid;
		$query = mysqli_query($this->connection , $sql);
		return $query;
		
	}

	public function select_id_for_meta($data) {
		//select id from $this->table where $condition
		foreach ($data as $key => $value) {
			$condition = $key . '=' . "'$value'";
		}
		$sql = "SELECT id from " .$this->table1 . ' WHERE ' . $condition;

		
		$query = mysqli_query($this->connection,$sql);
		$row =array();
		

		while ($rows = mysqli_fetch_assoc($query)) {
		 	$row[] = $rows;
		 } 
		 return $row;
		 
		
	 }
 }