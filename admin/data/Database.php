<?php 

class Database {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database ="assignment";
	public $connection;
	
	// public $error;
	// 
	// public $r_password;
	// protected $table1="page";
	// protected $table3 = "images";
	// public $src = "../upload/";
	// public $tmp = "";
	// public $filename = "";
	// public $type;
	// public $uploadfile;
	



	public function __construct() {
		if(!isset($this->connection)) {
			$this->connection = new mysqli($this->host,$this->user,$this->password,$this->database);
				if(!$this->connection) {
					echo "Database Not connected:".mysqli_error(); 
				}
			return $this->connection;
		}
	}


	public function insert($data,$table) {

		$condition = "";
		foreach ($data as $key => $value) {
			$condition .= $key . '=' . "'$value'" . ',';

		}

		$condition =rtrim($condition,',');

		$sql = "INSERT INTO ". $table . " SET " . $condition;
		$result = mysqli_query($this->connection,$sql);
		return $result;

	}



	public function delete($data,$table) {

		foreach ($data as $key => $value) {
			$condition =  $key . "=" . "'$value'"; 
		}
		
		$sql = "Delete from ". $table. " where " . $condition;
		$query = mysqli_query($this->connection,$sql);
		return $query;
	}


	public function show($table) {


		$sql = "select * from ". $table ;
		$query = mysqli_query($this->connection,$sql);

		$result = $this->rows_show($query);
		return $result;

	}


	public function update($data,$id,$table) {
		foreach ($data as $key => $value) {
			$condition = $key . '=' . "'$value'";
		}
		foreach ($id as $eid) {
			$uip = $eid;
			
		}
		$sql = "UPDATE " . $table . " SET " . $condition . " WHERE id=" . $eid;

		$query = mysqli_query($this->connection , $sql);

		return $query;
	}


	// public function select($data,$table) {

	// 	foreach ($data as $key => $value) {
	// 		// $condition = $key . '=' . $value;
	// 		$condition = $key . '=' . "'$value'";
	// 	}

	// 	$sql = "SELECT * from " . $table . " WHERE " .$condition ;
		
	// 	$query = mysqli_query($this->connection,$sql);

	// 	// $rows = array();
	// 	// while($row = mysqli_fetch_assoc($query)) {
	// 	// 	$rows[] = $row;
	// 	// }
	// 	// return $rows;

	// 	$result = $this->rows_show($query);
	// 	return $result;
	


	// }


	// public function id_select($data,$table) {

	// 	foreach ($data as $key => $value) {
 // 			$condition = $key . '=' ."'$value'";

 // 		}


 // 		$sql = "SELECT id FROM " .$table . " WHERE " . $condition;

 
 // 		$query = mysqli_query($this->connection,$sql);
 // 		$result = $this->rows_show($query);
	// 	return $result;
	// }



	public function image_select($data,$table) {


		foreach ($data as $key => $value) {
			$condition = $key . '=' .$value;
		}
		
		$selectphoto = "SELECT id,image FROM ". $table . " WHERE " . $condition;

		$query = mysqli_query($this->connection,$selectphoto);

		// $rows = array();

		// while($result = mysqli_fetch_assoc($query)) {
		// 	$rows[] = $result;
		// }

		// return $rows;

		$result = $this->rows_show($query);
		return $result;

	}


	public function rows_show($query) {

		$rows = array();
		while($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;

	}

	public function select2($data="",$criteria="",$tableName){
       if( is_array( $data ) && count( $data ) > 0 ){
           $sql="SELECT ";
           foreach ($data as $value) {
               $sql .=$value . ',';
           }
           $sql= rtrim( $sql,',');
           $sql.=' FROM '. $tableName;
           if (!empty($criteria)) {
                $sql.=' WHERE ';
               foreach ($criteria as $key => $value) {
                   $sql .=$key.'="' .$value. '" AND ';
               }
               $sql = substr($sql,0,-4);


           }
           $result= mysqli_query($this->connection,$sql);
           $a = $this->rows_show($result);
           return $a;
       }
       return false;
   }

}



