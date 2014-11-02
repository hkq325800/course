<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/course/inc/db.php' ;
/**
* 
*/
class Pager{
	public $page_size,$page_holder;
	public $page_start,$page_last,$page_current,$page_previous,$page_next;
	public $query;

	//构造函数
	function __construct($query,$page_size=2,$page_holder='page'){
		//全局变量与局部变量的区别
		global $db;

		$this->page_start = 1;
		$this->page_holder = $page_holder;  
		$this->page_size = $page_size;  
		$this->query = $query;  

		//$sql_amount = 'select count(*) as amount  ' . substr($query, strpos($query,'from' ) ) ;
		//计算总记录数
		//$row_amount = $db->query($sql_amount)->fetchObject()->amount;
		$row_amount=$query->count();
		//计算总页数	
		$this->page_last = ceil($row_amount / $page_size);
	}

	function query($page_current = 1){
		//全局变量与局部变量的区别
		global $db;

		$this->page_current = $page_current ;
		//当未指定页号，或者页号错误时	
		if (empty($page_current) || $page_current < 1){
			$this->page_current = 1;
		}elseif($page_current > $this->page_last){
			$this->page_current = $this->page_last;
		}

		//生成上一页、下一页
		$this->page_previous = ($this->page_current <= $this->page_start ) ? 0 : $this->page_current - 1 ;
		$this->page_next = ($this->page_current >= $this->page_last ) ? $this->page_current + 1 : $this->page_current + 1 ;

		//计算返回纪录的起点与记录数
		$row_base= ($this->page_current-1) * $this->page_size;
		//$page_sql = " LIMIT {$this->page_size} OFFSET {$row_base}";
		//$sql = $this->sql .  $page_sql;
		//return $db->query($sql);
		return $this->query->take($this->page_size)->skip($row_base);

	}

	public function nav_html($value=''){
		//{$_SERVER['SCRIPT_NAME']}=http://localhost/course/posts/index.php
		$query_str = "{$_SERVER['SCRIPT_NAME']}?" ;
		$arr = [
			'page_first' =>'page_start',
			'page_previous'=>'page_previous',
			'page_next'=>'page_next',
			'page_last'=>'page_last'
		];
		
		//as $_GET or $_POST
		$params = $_REQUEST;
		foreach ($arr as $key => $value) {
			$params[$this->page_holder] = $this->$value;//$this->$value=1024?????page_holder?????params????
			$key .= '_q';
			$$key =  $query_str . http_build_query($params);
		}
		//通过$key拼凑字符串赋给$$key 即$page_first_q等
		$shouye ='<a href='.$page_first_q.'>首 </a>';
		$shangye='<a href='.$page_previous_q.'>上 </a>';
		$xiaye='<a href='.$page_next_q.'>下 </a>';
		$moye='<a href='.$page_last_q.'>末 </a>';
		if($page_first_q>$page_previous_q)
			$shangye='';
		if($page_next_q>$page_last_q)
			$xiaye='';
		return 
	  '<div id="pager" align="center"> '.$shouye.$shangye.$xiaye.$moye.
	    //<a href="$page_first_q">首页</a>
	    //<a href="$page_previous_q">上一页</a>
	    //<a href="$page_next_q">下一页</a>    
	    //<a href="$page_last_q">末页</a>  
	    '<span>现 '.$this->page_current .' 页 </span>'.
	    '<span>共 '.$this->page_last .' 页</span> '.
	  '</div>  ' ; 

	}


}//end of class






 ?>