<?php

require_once 'components/DB.php';
require_once 'components/Router.php';
define('ROOT', __DIR__);

$router = new Router;
$router->run();





