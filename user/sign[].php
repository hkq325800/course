<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';

$sql = "insert into users (user_name,user_password,created_at) values(:name, :password,:created_at);" ;

$query = $db->prepare($sql);
//$query->bindParam(':userid','1',PDO::PARAM_INT);
$query->bindParam(':username',$_POST['username'],PDO::PARAM_STR);
$query->bindParam(':password',$_POST['password'],PDO::PARAM_STR);

if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../posts/index.php");
};

?>