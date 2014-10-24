<?php 
require_once '../inc/common.php';
require_once '../inc/session.php';
//require_once '../inc/db.php';
//require_once '../inc/orm.php';

/* Report all errors except E_NOTICE */
error_reporting(E_ALL^E_NOTICE);

//use Illuminate\Database\Capsule\Manager as Capsule;
//echo Capsule::table('posts')->count();
//class Post extends Illuminate\Database\Eloquent\Model {}
//echo Post::all()->count();

//echo PostModel::all()->count();

//$pager = new Pager('select * from posts ');
//$query = $pager->query($_GET['page']);

//pass a eloquent relation
$pager = new Pager(PostModel::select('*'));
$posts = $pager->query($_GET['page'])->get();
//$pager2 = new Pager('select * from users ',2,'page2');
//$query2 = $pager2->query($_GET['page2']);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>首页 - 博客</title>
</head>

<body background="./../img/1.jpg">
  <?php 
  //先假设session已传入为hkq
  //$_SESSION['user']='hkq';
  if(is_login()) echo '当前用户: ' . current_user()->user_name ;
  else echo '当前用户: 未登录 ' ;//redirect_to("../user/login.php");之后修改
  ?><a href="../user/signin.php" <?php if(is_login()) echo 'style="display:none"' ?> >注册</a>
    <a href="../user/login.php" <?php if(is_login()) echo 'style="display:none"' ?>    >登录</a>
    <a href="../user/logout.php" <?php if(!is_login()) echo 'style="display:none"' ?>    >退出</a>
  <table border=0 align="center">
    <caption><h1 align="center">帖子列表</h1>
    <a href="new.php" <?php if(!is_login()) echo 'style="display:none"' ?> >发帖</a>
    </caption>
    <thead>
      <tr>
        <th>id</th>
        <th>标题</th>
        <th>创建日期</th>
        <th>操作</th>        
      </tr>
    </thead>
    <tbody>
      <?php 

        //$query = $db->query('select * from posts');

        foreach($posts as $post)
        //while ( $post =  $query->fetchObject() ) //whilefetchObject
		{
          //下方post指fetchObject传回的id、title、body、created_at
      ?>
          <tr>
            <td><?php echo $post->id; ?></td>
            <td width="100" align="center"><a href="show.php?id=<?php print $post->id; ?>"><?php echo $post->title; ?></a></td>
            <td><?php echo date('Y-m-d',strtotime($post->created_at));?></td>
            <td> 
              <a href="edit.php?id=<?php echo $post->id; ?>">改</a> 
              <a href="delete.php?id=<?php echo $post->id; ?>">删</a> 
            </td>        
          </tr> 
 
      <?php  } ?>
  
    </tbody>
  </table>
  <?php echo $pager->nav_html(); ?> 
</body>
</html>


