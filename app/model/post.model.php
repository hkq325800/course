<?php 
  require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/orm.php' ;

  class PostModel extends Illuminate\Database\Eloquent\Model {
    protected $table = 'posts';
  }

?>

