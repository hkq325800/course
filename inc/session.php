<?php
	session_start();
	//require_once '../inc/db.php';
	//require_once '../inc/common.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/course/inc/db.php' ;
	require_once $_SERVER['DOCUMENT_ROOT'] . '/course/inc/common.php' ;

	function has_notice(){
		return isset($_SESSION['notice']); 
	}

	function get_notice(){
		return $_SESSION['notice']; 
	}

	function set_notice($notice){
		$_SESSION['notice'] = $notice;
	}

	function clean_notice(){
		unset($_SESSION['notice']); 
	}

 	function is_login(){
		return isset($_SESSION['user']); 
	}

	function login($name,$pwd,$remember_me=false){		
		$user = load_user($name);
		if( $user && encrypt_password($pwd) == $user->user_password ){
			$_SESSION['user'] =  $user->user_name;
			if($remember_me){
				$expire_time =  7*24*3600*100 ;
				session_set_cookie_params($expireTime);
			}
			set_notice("欢迎您：{$name} 来到本站!");
			return $user;			
		}else{
			set_notice("用户名或密码错误");
			return false;
		}
	}	  

	define("SALT_KEY","dsfsd2387008~!~@sdf");
	function encrypt_password($plain){
		return hash_hmac('sha256', $plain, SALT_KEY);
	}


	function logout(){
		session_destroy();	
	}

	function current_user(){
		if (is_login()) {
			return load_user(($_SESSION['user']));
		}

	}

	function load_user($id_or_name){//返回查询结果数组
		/*if(is_int($id_or_name)){
			$where = "id = :id";
		}else{
			$where = "name = :id";
		}*/
		$where = "user_name = :name";

		global $db;
		$sql = "select * from users where " . $where  ;
		$query = $db->prepare($sql);
		$query->bindParam(':name',$id_or_name);
		$query->execute();
		$user = $query->fetchObject();
		return $user;		
	}

	function authenticate_user(){
		if(!is_login()){
			set_notice('必须登录后方可使用本功能');
			redirect_to('/sessions/new.php');
		}

	}



?>