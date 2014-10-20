<!doctype html>
<?php

session_start();

// store session data

$_SESSION['article_id']=$_GET['id'];

?>
<html>
<head>
  <meta charset="UTF-8">
  <title>show | 博客</title>
</head>
<body background="./../img/1.jpg">
<a href="../">返回</a>
  <?php        
    require_once '../inc/db.php';    
    
    $query = $db->prepare('select * from posts where id = :id');
    $query->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetchObject();    
  ?>

  <h1><?php /* echo $post->id; */ ?><?php echo $post->title; ?>  </h1>
  <p><?php echo $post->body; ?></p>
  
  <table border=0>
    <caption><h3>评论列表</h3></caption>
    <thead>
      <tr>
        <!--<th>id</th>-->
        <th>用户</th>
        <th>评论日期</th>
        <th>评论内容</th>        
      </tr>
    </thead>
	<br/>
    <tbody>
	<?php
    $id = $_SESSION['article_id'];
	$query = $db->query('select * from comments where article_id = '."$id");
        while ( $post =  $query->fetchObject() ) //whilefetchObject
		{
	?>
	<tr>
            <!--<td><?php echo $post->id; ?></td>-->
            <td><?php echo $post->user_name; ?></td>
            <td><?php echo date('Y-m-d',strtotime($post->insert_date));?></td>
            <td><?php echo $post->text; ?></td>        
          </tr> <br/>
	<?php
	}
	?>
	</tbody>
  </table>
  <h2>我要评论</h2>

<form action="./../comments/save.php?id=<?php print $_SESSION['article_id']; ?>" method="post">
  <textarea name="text"></textarea>
  <br/>
  <input type="submit" value="提交" />
</form>
  <!--<a href="../comments/new.php?id=<?php print $_GET['id']; ?>">评论</a>-->
</body>
</html>