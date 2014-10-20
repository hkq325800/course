<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/course/inc/session.php' ;?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>signin | 博客</title>
</head>
<body background="./../img/1.jpg">
<a href="../">返回</a>
<div id="notice"  style="background-color:yellow;">
    <?php 
    if(has_notice()) 
      echo get_notice();
      clean_notice(); 
    ?>
  </div>
  <form id="fLogin" action="sign.php" method="post"> 
        <div class="m-ipt">
          <div class="iptctn">
          用户名：<input type="text" name="username" id="username" value="" placeholder="帐号" autofocus="autofocus"/>
          </div>
        </div>
        <div class="m-ipt">
          <div class="iptctn">
          密码 1：<input type="password" name="password1" id="password" value="" maxlength="20" placeholder="密码" />
          </div>
        </div>
        <div class="m-ipt">
          <div class="iptctn">
          密码 2：<input type="password" name="password2" id="password" value="" maxlength="20" placeholder="密码" />
          </div>
        </div>
        <button type="submit" id="loginBtn" class="u-btn2">注册</button>
        </form>
</body>
</html>