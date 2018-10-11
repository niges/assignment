<?php 

require_once(__dir__.'/../data/Crud.php');
require_once(__dir__.'/../data/Settings.php');



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
		
		if($crud->verify_add($data)) {

			//for metatable 'SELECT ID FOR  METATABLE'

			$idforpost = $crud->select_id_for_meta($data);

			foreach ($idforpost as $key => $value) {
			
			}

			$metadata = array(
						'page_type' => "page",
						'page_id' 	=> $value['id'],
						'images_id' => $result
						);

			if($meta->insert_metadata($metadata)) {

				
				$urlresult = $settings->Setting();
				foreach ($urlresult as $key => $url) {

					header('location:http://localhost/newassign/admin/view/page-manager.php');

				}

			}



			
			
		}
	}
	
	
}

if (isset($_GET['delete'])) {
	$id = $_GET['id'];
	$did = array( 'id' => $id);
	$result = $crud->delete_data($did);
	
	
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