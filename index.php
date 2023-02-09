<?php

require_once 'autoload.php';

if(!defined('ABSPATH')) define('ABSPATH', __DIR__);

use Utilities\Router;

$router = new Router();
$router->setNamespace('\App');

$router->get('/', 'Bot@index');

$router->set404(function(){
    header('HTTP/1.1 404 Not Found');
    echo 'this is 404 page';
});

$router->run();