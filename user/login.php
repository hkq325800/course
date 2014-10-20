<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>login | 博客</title>
  <style type="text/css">
.g-bd{  
  padding:65px;
  background-image: url(img/1.jpg);
}
.u-btn2{width:100px; height:30px; line-height:30px; margin:0 auto; font-size:20px;}
.m-tab-small .tabBd{padding:0 20px 30px 20px; height:360px;}
.m-tab-small{  margin-left:500px; margin-bottom:30px;}
.m-ipt .u-ipt{margin-right:0;}
.m-ipt{
  margin-bottom:20px;
}
.u-btn2{width:150px; margin-left:2px;}
</style>
</head>
<body background="./../img/1.jpg">
<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL^E_NOTICE);
?>
<a href="../">返回</a>
<form id="fLogin" target="_self" method="POST" action="log.php"> 
  <div class="m-ipt">
    <div class="iptctn">
      <input type="text" name="username" id="username" value="" placeholder="帐号" autofocus="autofocus"/>
    </div>
  </div>
  <div class="m-ipt">
    <div class="iptctn">
      <input type="password" name="password" id="password" value="" maxlength="20" placeholder="密码" />
    </div>
  </div>
  <input type="submit" name="submit" id="loginBtn" class="u-btn2" value="登录"/>
</form>
</body>
</html>