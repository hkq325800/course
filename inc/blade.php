<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use Philo\Blade\Blade;

$views = __DIR__ . '/../app/view';
$cache = __DIR__ . '/../tmp/cache';

$blade = new Blade($views, $cache);


 ?>