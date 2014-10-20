<?php 


//mysql_query("SET NAMES utf8");    


try{
	$db = new PDO("mysql:host=127.0.0.1;dbname=phpdemo;","demo","demo");
	$db->query("SET NAMES 'utf8'");
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}catch (PDOException $e){
	echo $e->getMessage() . '<br/>';
}
	
?>