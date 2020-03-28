<?php

function addAllClass ($class) {

    if (explode('/', $class) == 'Core') {
        if (file_exists('/var/www/html/MVC_PiePHP/' . $class . '.php')) {
            require_once('/var/www/html/MVC_PiePHP/' . $class . '.php');
        }
    } elseif (in_array(explode('/', $class) , ['Model', 'View', 'Controller'])) {
        if (file_exists('/var/www/html/MVC_PiePHP/' . $class . '.php')) {
            require_once('/var/www/html/MVC_PiePHP/' . $class . '.php');
        }
    }
}

spl_autoload_register("addAllClass");