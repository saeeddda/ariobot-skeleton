<?php

require_once 'autoload.php';
require_once 'Utilities/helpers.php';

use Utilities\Helpers;

if(!defined('ABSPATH'))
    define('ABSPATH', __DIR__);


echo Helpers::getUrl();