<?php 

require_once '../inc/session.php';
require_once '../inc/db.php';
require_once '../inc/common.php';

/*$sql = "select * from users where user_name=:username and user_password=:password;" ;	

$query = $db->prepare($sql);
//$query->bindParam(':userid','1',PDO::PARAM_INT);
$query->bindParam(':username',$_POST['username'],PDO::PARAM_STR);
$query->bindParam(':password',$_POST['password'],PDO::PARAM_STR);

if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../posts/index.php");
};*///mysql_fetch_array($query)
if($_POST['submit']){
	$name = trim($_POST['username']);
	$pwd = encrypt_password($_POST['password']); 
	$sql="select * from users where user_name=:username and user_password=:password limit 1";
	//$query->bindParam(':userid','1',PDO::PARAM_INT);
	//$query->bindParam(':username',$name,PDO::PARAM_STR);
	//$query->bindParam(':password',$pwd,PDO::PARAM_STR);
	//print_r($sql);
	$query = $db->prepare($sql);
	$query->bindValue(':username',$name,PDO::PARAM_STR);
	$query->bindValue(':password',$pwd,PDO::PARAM_STR);
	$query->execute();
	$post = $query->fetchObject();
	//$query=mysql_query($sql);
	//$post =$query->fetchObject();
	$name=$post->user_name;
	if(isset($name)){
 		echo "成功";
 		$_SESSION['user']=$name;
 		redirect_to("../");
 		exit;
 	}

 	else{
 		  echo "失败";
 		  exit;
	}
}

?>