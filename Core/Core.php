<?php

namespace Core;

class Core {

    public function run(){
        echo __CLASS__ . " [OK] " . PHP_EOL;
        echo $_SERVER['REQUEST_URI'] . '<br>';

        $arr = explode("/", $_SERVER['REQUEST_URI']);
        print_r($arr);
        echo  '<br>';
        if (isset($arr[2]) && isset($arr[3])) {
            $classe = ucfirst($arr[2]) . "Controller";
            $method = $arr[3] . "Action";
            echo "$classe -> $method<br>";
            if (class_exists($class())) {
                $controller = new $class();
                if (method_exists($method)) {
                    $controller->$method();
                }else {
                    echo "fail method";
                }
            }else {
                echo "fail class";
            }
        }else {
            echo "404";
        }
    }
}