@extends('layout.master')  

@section('content')
  @include('notice')
  <?php 
  //先假设session已传入为hkq
  //$_SESSION['user']='hkq';
  if(is_login()) echo '当前用户: ' . current_user()->user_name ;
  else echo '当前用户: 未登录 ' ;//redirect_to("../user/login.php");之后修改
  ?>

  <?php 
    require_once '../inc/blade.php';
    //$name = 'tom';    
    //echo $blade->view()->make('hello',['name'=>$name]);
    echo $blade->view()->make('notice');//设置了notice
  ?>

  <a href="../user/signin.php" <?php if(is_login()) echo 'style="display:none"' ?> >注册</a>
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
