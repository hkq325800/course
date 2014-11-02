@extends('layout.master')  

@section('content')
  @include('notice')
  @if (is_login())
    <p>欢迎你: {{current_user()->user_name}} <a href="user/logout.php" >退出</a></p>
    
  @else
    <a href="user/signin.php" >注册</a>
  <a href="user/login.php" >登录</a>
  @endif
  

  
  
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

        foreach($pager->query($_GET['page'])->get() as $post)
    {
          //下方post指fetchObject传回的id、title、body、created_at
      ?>
          <tr>
            <td>{{ $post->id }}</td>
            <td width="100" align="center"><a href="show.php?id={{$post->id}}">{{$post->title}}</a></td>
            <td>{{ date('Y-m-d',strtotime($post->created_at)) }}</td>
            <td> 
              <a href="edit.php?id={{$post->id}}">改</a> 
              <a href="delete.php?id={{$post->id}}">删</a> 
            </td>        
          </tr> 
 
      <?php  } ?>
  
    </tbody>
  </table>
  {{ $pager->nav_html() }}

@stop


@section('siderbar')
  @parent
  <div>here is override</div>
@stop {{-- or @overwrite --}}