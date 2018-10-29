<?php
include_once(__dir__.'/Database.php');


class Request extends Database {

	public $table = 'countries';

	public function show_countries() {
		$result = $this->show($this->table);
		return $result;

	}
}
$request = new Request();
