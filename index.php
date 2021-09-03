<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

require_once 'components/Autoload.php';
define('ROOT', __DIR__);

$router = new Router;
$router->run();





