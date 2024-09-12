<?php

namespace App;

use Longman\TelegramBot\Request;
use App\Utilities\Helpers;
use Exception;

class BotController
{
    public function index()
    {
        $response = Request::getMe();
        echo $response;
    }

    public function webhook()
    {
        $mysql_credentials = [
            'host'     => Helpers::config('host'),
            'port'     => Helpers::config('port'),
            'user'     => Helpers::config('user'),
            'password' => Helpers::config('password'),
            'database' => Helpers::config('database'),
        ];

        global $telegram;
        $telegram->enableMySql($mysql_credentials);
        $telegram->handle();
    }

    public function setWebhook()
    {
        try {
            global $telegram;

            $result = $telegram->setWebhook(
                trim(Helpers::config('site_url'), '/') . '/webhook'
            );

            if ($result->isOk()) {
                echo $result->getDescription();
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
