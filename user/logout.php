<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>signin | 博客</title>
</head>
<body background="./../img/1.jpg">
<a href="../">返回</a>
<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . '/course/inc/session.php' ;
  logout();
  //echo $_SESSION['user'];
  redirect_to("../user/login.php");
?>
  
</body>
</html>