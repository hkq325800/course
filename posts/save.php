<?php 

require_once '../inc/db.php';
require_once '../inc/common.php';
require_once '../inc/session.php';

$sql = "insert into posts(user_name,title,body,created_at) values(:user,:title, :body,:created_at);" ;	
$query = $db->prepare($sql);
$query->bindParam(':user',current_user()->user_name,PDO::PARAM_STR);
$query->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
$query->bindParam(':body',$_POST['body'],PDO::PARAM_STR);
$query->bindParam(':created_at',$created_at,PDO::PARAM_STR);

$created_at = date('Y-m-d H:i:s');	//CURRENT_TIMESTAMP
if (!$query->execute()) {	
	print_r($query->errorInfo());
}else{
	set_notice('成功新增一条新帖子,id为'. $db->lastInsertId()) ;//important
	redirect_to("./");
};

?>