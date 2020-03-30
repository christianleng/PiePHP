<?php

function addAllClass ($class) {
    $srcFolders = ['Controller', 'Model', 'View'];
    $nameSpace = explode("\\", $class)[0]; //Core
    $className = explode("\\", $class)[1]; // les autres
    // echo $nameSpace . ' test<br>';
    if ($nameSpace == 'Core') {
        if (file_exists('/var/www/html/MVC_PiePHP/' . $nameSpace . '/'. $className . '.php')) {
            require_once('/var/www/html/MVC_PiePHP/' . $nameSpace . '/'. $className . '.php');
        }
    } 
    elseif(in_array($nameSpace, $srcFolders)) {
        if (file_exists('/var/www/html/MVC_PiePHP/src/' . $nameSpace . '/' . $className . '.php')) {
            require_once('/var/www/html/MVC_PiePHP/src/' . $nameSpace . '/' . $className . '.php');
        }
    }
}
spl_autoload_register("addAllClass");
