<?php 

class Database {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database ="assignment";
	public $connection;
	protected $table = "admin";
	public $error;
	public static $instance;
	public $r_password;
	protected $table1="page";
	protected $table3 = "images";
	public $src = "../upload/";
	public $tmp = "";
	public $filename = "";
	public $type;
	public $uploadfile;
	



	public function __construct() {
		if(!isset($this->connection)) {
			$this->connection = new mysqli($this->host,$this->user,$this->password,$this->database);
				if(!$this->connection) {
					echo "Database Not connected:".mysqli_error(); 
				}
			return $this->connection;
		}
	}


}

$data = new Database();

