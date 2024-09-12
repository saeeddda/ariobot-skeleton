<?php

namespace App\Utilities;

class Helpers
{
    private static $base_dir = '';

    public static function config($key)
    {
        $configFile = include(self::$base_dir . '/config/bot.php');
        return $configFile[$key];
    }

    public static function getUrl()
    {
        return ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'];
    }

    public static function setBaseDir($path)
    {
        self::$base_dir = $path;
    }
}
