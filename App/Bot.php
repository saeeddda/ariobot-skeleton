<?php

namespace App;

use TelegramApi\API;

class Bot{
    use API;

    private $token;
    private $admin_token;
    private $admin_id;

    public function sendRequest(string $method, array $args): mixed
    {
        
    }
}