<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';
require_once '../inc/session.php';

$sql = "insert into comments(user_name,text,insert_date,article_id) values(:user, :text,:insert_date,:article_id);" ;	
if(is_login())
	$user=current_user()->user_name;
else $user='匿名用户';
$query = $db->prepare($sql);
$query->bindParam(':user',$user,PDO::PARAM_INT);
$query->bindParam(':text',$_POST['text'],PDO::PARAM_STR);
$query->bindParam(':insert_date',$insert_date,PDO::PARAM_STR);
$query->bindParam(':article_id',$_GET['id'],PDO::PARAM_INT);

$insert_date = date('Y-m-d H:i:s');	//CURRENT_TIMESTAMP
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	redirect_to("../posts/show.php?id=".$_GET['id']);
};

?>