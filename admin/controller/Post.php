<?php 
include_once(__dir__.'/../data/Post.php');
require_once(__dir__.'/../data/Settings.php');
include_once(__dir__.'/../data/Image.php');

$post = new Post();

if (isset($_POST['add-post'])) {

	$data = array(

			'title'=>$_POST['title'],
			'content'=>$_POST['content'],
			'seo_title'=>$_POST['seo-title'],
			'meta_title'=>$_POST['meta-title'],
			'active'=>$_POST['isActive']

			);

	if ($post->add($data)) {
		$idforpost = $post->select_id_for_meta($data);
	}

	foreach ($idforpost as $key => $value) {
		$post = $value['id'];
		
	}

	$files = $_FILES['file']['name'];

	for ($i=0; $i < count($files); $i++) { 

		$imagepath = "../static/upload/";
		$cropimagepath = "../static/upload/crop/";
		$ext = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
		$name = md5(time() . rand()); 
		$newname =  $name . '.' . $ext;
		$tmpname = $_FILES['file']['tmp_name'][$i];
		move_uploaded_file($tmpname, $imagepath . $newname);

			if ($ext == "jpg") {
			$cropname = $name . '-thumbnail.' . $ext;
			$im = imagecreatefromjpeg($imagepath.$newname);
			$sizeheight = '250';
			$sizewidth = '250';
			$im2 = imagecrop($im, ['x'=>0, 'y'=>0, 'width'=> $sizewidth , 'height' => $sizeheight]);
				if ($im2 !== FALSE) {
					imagepng($im2,$cropimagepath.$cropname);
					imagedestroy($im2);
				}
			} elseif ($ext == "PNG" || $ext == "png") {
				$cropname = $name . '-thumbnail.' . $ext;
				$im = imagecreatefrompng($imagepath.$newname);
				$sizeheight = '250';
				$sizewidth = '250';
				$im2 = imagecrop($im, ['x'=>0, 'y'=>0, 'width'=> $sizewidth , 'height' => $sizeheight]);
				if ($im2 !== FALSE) {
					imagepng($im2,$cropimagepath.$cropname);
					imagedestroy($im2);
				}
			} else {
				echo "Extension Not Found";
			}

		$insertimage = array('image' => $newname,'crop'=> $cropname);

		$image->add_image($insertimage);

		$dataforimage = array('image' => $newname);

		$row = $image->selectid($dataforimage);

		$value1 = mysqli_fetch_assoc($row);
		foreach ($value1 as $key => $image_id) {
				$image_id;
		}

		$metadata = array(
						'page_type' => "post",
						'page_id' 	=> $post,
						'images_id' => $image_id
						);
	 	$wow = $meta->insert_metadata($metadata);			

	}

	if($wow == true) {
			header("location:".$server_root."admin/view/post-manager.php");
	}

}

if (isset($_GET['delete'])) {

	$data = array('id' => $_GET['delete']);
	$post->delete_post($data);
}


if (isset($_POST['edit'])) {
	$data = array(
			'title'=>$_POST['title'],
			'content'=>$_POST['content'],
			'seo_title'=>$_POST['seo-title'],
			'meta_title'=>$_POST['meta-title'],
			'active'=>$_POST['isActive']

			);
	$id = array('id' => $_GET['id']);
	if($post->update_post($data,$id)) {
		header("Location:".$server_root."/admin/view/post-manager.php");
	}
}
