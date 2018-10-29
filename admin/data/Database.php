<?php 

class Database {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database ="assignment";
	public $connection;
	
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
		$condition = "";
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
		$condition = "";
		foreach ($data as $key => $value) {
			$condition .= $key . '=' . "'$value'".',';
		}
		$condition = rtrim($condition,',');
			
		$sql = "UPDATE " . $table . " SET " . $condition . " WHERE id=";


		if (is_array($id)) {

			foreach ($id as $eid) {
			// $uip = $eid;
			
			}
			$sql .= $eid;
			
		}  else {
			$sql = substr($sql,0,-10);
			$sql .= $id;
		}
		
		$query = mysqli_query($this->connection , $sql);

		return $query;
	}

	public function image_select($data,$table) {

		foreach ($data as $key => $value) {
			$condition = $key . '=' .$value;
		}
		
		$selectphoto = "SELECT id,image,crop FROM ". $table . " WHERE " . $condition;

		$query = mysqli_query($this->connection,$selectphoto);
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

	public function select($data,$criteria,$tableName){
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
           // $fetch = $this->rows_show($result);

           return $result;

       }
       return false;
   }
   public function slug_select($slug,$table) {
   		$select = "SELECT * FROM " .$table." WHERE slug LIKE "."'$slug%'" ;
   		$query = mysqli_query($this->connection,$select);
   		return $query;
   }
}
$data = new Database();



