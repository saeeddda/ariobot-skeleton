<?php

require_once 'vendor/autoload.php';
require_once 'autoload.php';

if(!defined('ABSPATH')) define('ABSPATH', __DIR__);

use Longman\TelegramBot\Telegram;
use Utilities\Helpers;
use Utilities\Router;

global $telegram;
$telegram = new Telegram(Helpers::config('bot_token'));

$router = new Router();
$router->setNamespace('\App');

$router->get('/', 'Bot@index');
$router->get('/set-webhook', 'Bot@setWebhook');
$router->post('/webhook', 'Bot@webhook');

$router->set404(function(){
    header('HTTP/1.1 404 Not Found');
    echo 'this is 404 page';
});

$router->run();