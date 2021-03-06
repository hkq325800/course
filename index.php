<?php 
require_once 'inc/session.php';
require_once 'inc/common.php';
require_once 'inc/blade.php';
//index.php?q=   =>   root_path
//index.php?q=posts/   => posts#index
//index.php?q=posts/show/1   => posts#show(1)
//index.php?q=posts/show/2014/05/01	=> posts#show(2014,05,01)
//index.php?q=posts/show/2014/05/01&page=1	=> posts#show(2014,05,01) and $_GET['page']

/* Report all errors except E_NOTICE */
error_reporting(E_ALL^E_NOTICE);

$root_path = 'posts/';

//$q = $_REQUEST['q'];
unset($_REQUEST['q']);
if (empty($q)) { $q = $root_path ;}; 

list($controller,$action,$param) = explode('/', $q);//看第一个参数，如果第一个参数不是正则表达式，split改为 explode；如果是正则表达式，split改为preg_split
$action = empty($action) ? 'index' : $action ;

//ucwords();
$controller_class = ucfirst($controller) . 'Controller';
$controller_instance = new $controller_class();
$ret = $controller_instance->$action();

//这里有个单复数问题,后续再解决
//[posts,index] => 'post.index'
$view_name = substr($controller,0,strlen($controller)-1) . '.' . $action;
echo $blade->view()->make($view_name ,$ret);
?>
