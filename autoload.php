<?php 

function bot_autoloader($class_name){
  	$class_name = str_replace('\\','/', $class_name);
    $file_address = ABSPATH . DIRECTORY_SEPARATOR . $class_name . '.php';
	//var_dump($file_address);
  	//var_dump(file_exists($file_address));
  	//exit();
  
    if(file_exists($file_address)){
        include_once $file_address;
    }
}

spl_autoload_register('bot_autoloader');