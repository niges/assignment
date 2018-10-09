<?php 
include_once('Database.php');
include_once('Meta.php');


class Image extends Database {

	public $table = "images";


	public function selectid($data) {
 		foreach ($data as $key => $value) {
 			$condition = $key . '=' ."'$value'";
 		}
 		$sql = "SELECT id FROM " .$this->table . " WHERE " . $condition;
 
 		$query = mysqli_query($this->connection,$sql);
 		$rows = array();
 		while($row = mysqli_fetch_assoc($query)) {
 			$rows[] = $row;
 		}
 		return $rows;
 		
 	}



	public function add_image($data) {
		$condition = "";
		foreach ($data as $key => $value) {
			$condition .= $key . '=' . "'$value'" . ',';
			
			# code...
		}
		$condition =rtrim($condition,',');
		$sql = "INSERT INTO ". $this->table . " SET " . $condition;
		$result = mysqli_query($this->connection,$sql);

		



	}

	public function show_images() {
		//select * from tablename 
		$sql = "select * from " .$this->table;

		$query = mysqli_query($this->connection,$sql);

		$rows = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;

		
		
	}
	public function delete_image($data) {
		foreach ($data as $key => $value) {
			$condition = $key . '=' .$value;
		}
		
		$selectphoto = "SELECT image FROM ". $this->table . " WHERE " . $condition;
		$query = mysqli_query($this->connection,$selectphoto);
		$result = mysqli_fetch_array($query);


		foreach ($result as $field) {
			$name = $field;
			
		}

		$sql = "DELETE FROM " .$this->table . " WHERE " . $condition;
		
		$query = mysqli_query($this->connection,$sql);	
		if ($query == true) {
			unlink("../static/upload/" . $name);
			
		}
		


		return $query;	
	}
	//only_Selected for show images

	public function only_selected($data) {

		foreach ($data as $key => $value) {
			$condition = $key . '=' . $value;
		}
		
		$sql = "SELECT image,id from " .$this->table . " WHERE " .$condition ;

		$query = mysqli_query($this->connection,$sql);


		$rows = array();
		while($row = mysqli_fetch_assoc($query)) {
			$rows[] = $row;
		}
		return $rows;


	}

	
	
}

$image = new Image();
if (isset($_POST['upload'])) { //not validated yet 
	if (($_FILES['file']['size'] == 0) ) {
		echo "Empty Files";
	} else {
		$file = $_FILES['file'];
		
		
		$imagepath = "../static/upload/";

		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		$newname = md5(time() . rand()) . '.' . $ext;
		$tmpname = $file['tmp_name'];

		move_uploaded_file($tmpname, $imagepath . $newname);

		
		$data =array(
				
				'image' => $newname
				
				);
	
		
		$image->add_image($data);

		if (!empty($_GET['id'])) {
				$row = $image->selectid($data);
		
		
		// if($image->add_image($data)) {
			
			foreach ($row as $key => $value) {
				$imageid =  $value['id'];
			}
			
			$insertimage = array(
							'page_type' => 'post',
							'page_id' => $_GET['id'],
							'images_id' => $imageid
							);
			$meta->insert_metadata($insertimage);		}
	



			// echo "Image added successfully";

		// }
	}
	
	
}
if (isset($_GET['delete'])) {
	
	
	$data = array( 'id' => $_GET['id']);

	$ndata = $_GET['id'];

	$pageid = $meta->selectPageId($ndata);
	foreach ($pageid as $key => $value) {
				
	}

	if (!empty($value['page_id'])) {

		if($image->delete_image($data)) {
			
			header('Location:?show=1&id='.$value['page_id']);
		}

		
	} else {
		if($image->delete_image($data)) {
			header('Location:' . $_SERVER['PHP_SELF']);
		}

	}

		
		

		
			
	
}

