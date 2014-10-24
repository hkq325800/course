<?php 
  date_default_timezone_set('PRC');
  function redirect_to($dest="/"){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $dest"); 
  }
  
  function redirect_back(){
  	header("Location: {$_SERVER['HTTP_REFERER']} "); 
  }

  //Define autoloader
function myautoload($className) {
  $class_path = __DIR__ . '/' . strtolower($className) . '.php'; //strtolower字符串转换为小写
  if (file_exists($class_path )) {
    require_once $class_path ;
    return true;
  }
  return false;
}
spl_autoload_register('myautoload');

function str_to_underscore($class){
  return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $class));
}

class autoloader {
    public static $loader;

    // 单例模式
    public static function init(){
      if (self::$loader == NULL)
          self::$loader = new self();
      return self::$loader;

    }

    public function __construct(){
      spl_autoload_register(array($this,'model'));
      spl_autoload_register(array($this,'controller'));
      spl_autoload_register(array($this,'library'));
    }

    // 放置公用的工具类，如Pager
    public function library($class){
      set_include_path(get_include_path().PATH_SEPARATOR . 'D:\xampp\htdocs\course\app\model\library');
      spl_autoload_extensions('.php');
      spl_autoload($class);
    }

    public function controller($class){
      $class_fullname = str_to_underscore($class);
      $class = preg_replace('/_controller$/ui','',$class_fullname);

      if ($class != $class_fullname) {      
        //$class = preg_replace('/_controller$/ui','',$class);
        set_include_path(get_include_path().PATH_SEPARATOR.'D:\xampp\htdocs\course\app\controller');
        spl_autoload_extensions('.controller.php');
        spl_autoload($class);
      }
    }

    public function model($class){
      //echo $class;
      $class_fullname = str_to_underscore($class);
      $class = preg_replace('/_model$/ui','',$class_fullname);
      
      if ($class != $class_fullname) {

        set_include_path(get_include_path().PATH_SEPARATOR . 'D:\xampp\htdocs\course\app\model');
        //echo (get_include_path().PATH_SEPARATOR . './course/app/model/');
        spl_autoload_extensions('.model.php');
        spl_autoload($class);
      }
    }

    

}

autoloader::init();
?>