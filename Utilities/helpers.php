<?php

namespace Utilities;

class Helpers{
    public static function config($key){
        $json_file = file_get_contents(ABSPATH . '/config.json');
        $json = json_decode($json_file, true);
        return $json[$key];
    }

    public static function getUrl(){
        return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'];
    }
}