<?php 

include_once('Database.php');
include_once('Image.php');
include_once('Meta.php');


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
		

		// if($query) {
		// 	return true;
		// } else {
		// 	$this->error = "Invalid Data";
		// }

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

		// $condition1 = "SELECT image  from " . $this->table1 . " where id=" . "'$value'";
		// $query1 = mysqli_query($this->connection,$condition1);
		// $query2 = mysqli_fetch_assoc($query1);
		// return $query2;
		$sql = "Delete from ".$this->table1. " where " . $condition;
		

		$query = mysqli_query($this->connection,$sql);
		


		
		

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


 $crud = new Crud();

//not validated yet 
 if (isset($_POST['add'])) { 
	if (empty($_POST['title']) ||  empty($_POST['body'])) {
		$message = $crud->error;
		echo "You must enter title and body";
	} else {
		$file = $_FILES['file'];
		
		
		$imagepath = "../static/upload/";

		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		$newname = md5(time() . rand()) . '.' . $ext;
		$tmpname = $file['tmp_name'];



		move_uploaded_file($tmpname, $imagepath . $newname);

		//insert into image table
		$insertimage = array('image' => $newname);
		$result = $image->add_image($insertimage);

		$dataforimage = array('image' => $newname);

		// post data

		$row = $image->selectid($dataforimage);

		foreach ($row as $key => $value) {
			$result = $value['id'];
		}


		$data =array(
				'title' => $_POST['title'],
				'body' => $_POST['body'],
				
				);
		
		if($crud->verify_add($data,$table)) {

			//for metatable 'SELECT ID FOR  METATABLE'

			$idforpost = $crud->select_id_for_meta($data);
		

			foreach ($idforpost as $key => $value) {
			
			}

			$metadata = array(
						'page_type' => "page",
						'page_id' 	=> $value['id'],
						'images_id' => $result
						);
			$meta->insert_metadata($metadata);

			
			header("location:http://localhost/newassign/admin/view/page-manager.php");
			
		}
	}
	
	
}
if (isset($_GET['delete'])) {
	$id = $_GET['id'];
	$did = array( 'id' => $id);
	$crud->delete_data($did);


	// foreach ($query2 as $key => $value) {
	// 	# code...
		
	

	// if($crud->delete_data($did)) {
	// 	unlink("../upload/" . $value);
		
	// }
		
	// }
}
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$where = array('id' => $id);
	$data = array(
		'title' => $_POST['title'],
		'body' => $_POST['body'],
		
		
	);
	
	if($crud->update_data($data,$where)) {
		header("Location:http://localhost/newassign/admin/view/page-manager.php");
	}
	
}