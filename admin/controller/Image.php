<?php 


require_once(__dir__.'/../data/Image.php');

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

