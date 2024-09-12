<?php

$router->get('/', 'BotController@index');
$router->get('/set-webhook', 'BotController@setWebhook');
$router->post('/webhook', 'BotController@webhook');

$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    echo 'this is 404 page';
});