<?php

require_once 'vendor/autoload.php';

use App\Utilities\Router;
use App\Utilities\Helpers;
use Longman\TelegramBot\Telegram;

//Set base dir in helpers class
Helpers::setBaseDir(__DIR__);

//Create global variable for telegram bot
global $telegram;

//Get instance of Telegram bot and set to global variable
$telegram = new Telegram(
    Helpers::config('bot_token'), 
    Helpers::config('bot_username')
);

//Get instance of router
$router = new Router();

//Set App namespace
$router->setNamespace('\App');

//Include routes from file
include_once(__DIR__ . '/routes/web.php');

//Run all routes
$router->run();
