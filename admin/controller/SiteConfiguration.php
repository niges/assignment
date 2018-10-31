<?php
include_once(__dir__.'/../data/SiteConfiguration.php');

if (isset($_POST['update'])) {
	// if ($_FILES['file']['size'] > 0) {

		$file = $_FILES['file'];
		$imagepath = "../static/upload/";
		$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
		$name =md5(time() . rand());
		$newname = $name . '.' . $ext;
		$tmpname = $file['tmp_name'];
		
		move_uploaded_file($tmpname, $imagepath . $newname);

		if (empty($ext)) {
			$data = array(
			'server_root' => $_POST['siteurl'],
			'site_name' => $_POST['sitename'],
			'footer' => $_POST['footer'],
			);
			if($siteconfiguration->update_data($data)) {
				$message = $siteconfiguration->error;
			}
			
		} else {
			$data = array(
			'server_root' => $_POST['siteurl'],
			'logo' => $newname,
			'site_name' => $_POST['sitename'],
			'footer' => $_POST['footer'],
			);
			if($siteconfiguration->update_data($data)) {
				$message = $siteconfiguration->error;
			}
		}
	
	// } else {
	// 	echo ' You must Enter File';
	// }
}

?>