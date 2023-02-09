<?php 

function bot_autoloader($class_name){
    $class_name = $class_name . '.php';

    if(file_exists($class_name)){
        include_once $class_name;
    }
}

spl_autoload_register('bot_autoloader');