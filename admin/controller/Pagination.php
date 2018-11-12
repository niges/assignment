<?php 
include_once(__dir__.'/../data/Settings.php');
include_once(__DIR__.'/Post.php');
include_once(__dir__.'/../data/Pagination.php');

$pagination = new Pagination();

$post_paginate = $post->paginate();
foreach ($post_paginate as $key => $value) {
	$GLOBALS['paginate'] = $value['pagination'];
}






 