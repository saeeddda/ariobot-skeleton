<?php

namespace App;

use Longman\TelegramBot\Request;
use Utilities\Helpers;

class Bot{    
    public function index(){
        $response = Request::getMe();
        echo $response;
    }

    public function webhook(){
        $mysql_credentials = [
            'host'     => Helpers::config('host'),
            'port'     => Helpers::config('port'),
            'user'     => Helpers::config('user'),
            'password' => Helpers::config('password'),
            'database' => Helpers::config('database'),
         ];

        global $telegram;
        $telegram->enableMySql($mysql_credentials);
        $telegram->handleGetUpdates();
    }

    public function setWebhook(){
        global $telegram;

        $result = $telegram->setWebhook(Helpers::config('webhook_url'));
        if ($result->isOk()) {
            echo $result->getDescription();
        }
    }
}