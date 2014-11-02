<?php 
require_once '../inc/common.php';
require_once '../inc/session.php';
//require_once '../inc/db.php';
//require_once '../inc/orm.php';



//use Illuminate\Database\Capsule\Manager as Capsule;
//echo Capsule::table('posts')->count();
//class Post extends Illuminate\Database\Eloquent\Model {}
//echo Post::all()->count();

//echo PostModel::all()->count();

//$pager = new Pager('select * from posts ');
//$query = $pager->query($_GET['page']);

//pass a eloquent relation

$pager = new Pager(PostModel::select('*'));
//$posts = $pager->query($_GET['page'])->get();

//$pager2 = new Pager('select * from users ',2,'page2');
//$query2 = $pager2->query($_GET['page2']);

//require_once '../inc/blade.php';
//echo $blade->view()->make('post.index',['pager'=>$pager]);
?>


