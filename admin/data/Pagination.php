<?php 

include_once(__dir__.'/Post.php');

 
class Pagination extends Post {

	public function select_post($page) {
		 $offset = ($page - 1) * 5;
		 $data_per_page = $this->show_data($offset,$record=5);
		 return $data_per_page;
	}
}

