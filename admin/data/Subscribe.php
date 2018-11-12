<?php 
include_once(__dir__.'/Database.php');

Class Subscribe extends Database {
	public $table = 'subscribe';

	public function add($data) {

		$result = $this->insert($data,$this->table);
		return $result;
	}

	public function check($criteria) {
		$data = array('*');
		$result= $this->select($data,$criteria,$this->table);
		return $result;
	}

	public function show_data() {
		$result = $this->show($this->table);
		return $result;
	}

	public function delete_subscribers($id) {

		$data = array('id' => $id);
		$result = $this->delete($data,$this->table);
		return $result;
	}
	
	public function export_xls() {

		$filename = "Webinfopen.csv"; // File Name
		// Download file
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Type: application/vnd.ms-excel");
		ob_end_clean();
		$new = array('*');
		$query = $this->select($new,$data='',$this->table);
		$hello = fopen("php://output", "w");
		fputcsv($hello, array('id','email','date'));
		while($row = mysqli_fetch_assoc($query)) {
			fputcsv($hello, array_values($row));	
		}
		fclose($hello);
		exit();
	}

}