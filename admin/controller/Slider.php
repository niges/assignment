<?php 
include_once(__dir__.'/../data/Slider.php');
include_once(__dir__.'/../data/Image.php');

$slider = new Slider();

if (isset($_POST['add-slider'])) {

	if (!empty($_FILES['file']['size'])>0) {

		$file = $_FILES['file'];
		$imagepath = "../static/upload/";
		$cropimagepath = "../static/upload/crop/";

		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		$name = md5(time() . rand()); 
		$newname =  $name . '.' . $ext;
		$tmpname = $file['tmp_name'];

		move_uploaded_file($tmpname, $imagepath . $newname);

			// $insertimage = array('image' => $newname,'crop'=> $cropname);

			// $result = $image->add_image($insertimage);

			// $dataforimage = array('image' => $newname);

			// $row = $image->selectid($dataforimage);

			// foreach ($row as $key => $value) {
			// 	$result = $value['id'];
			// }
		

		$data = array(
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'image' => $newname			
				);

		if($slider->insert_data($data)) {

			// $idforslider = $slider->select_id_for_meta($data);

			// foreach ($idforslider as $key => $value) {
			
			// }

			// $metadata = array(
			// 			'page_type' => "slider",
			// 			'page_id' 	=> $value['id'],
			// 			'images_id' => $result
			// 			);
	 	// 	if($meta->insert_metadata($metadata)) {
	 			header("location:".$server_root."admin/view/slider.php");
	 		// }

		}
		
	} else {
		echo 'You need to upload file';
	}
}


if (isset($_GET['delete'])) {

	$data = array('id' => $_GET['id']);
	$slider->delete_slider($data);
}


if (isset($_POST['edit'])) {
	$data = array(
			'title'=>$_POST['title'],
			'content'=>$_POST['content']
			);
	$id = array('id' => $_GET['id']);
	if($slider->update_slider($data,$id)) {
		header("Location:".$server_root."/admin/view/slider.php");
	}
}