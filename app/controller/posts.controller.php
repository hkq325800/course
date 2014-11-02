<?php 

/**
* 
*/
class PostsController{
	function __construct(){
		# code...
	}

	function index(){
		$pager = new Pager(PostModel::select('*'));
		return compact('pager');
	}
}

 ?>