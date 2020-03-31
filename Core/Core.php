<?php
namespace Core;

class Core{

    public function __construct() {
        require_once("src/routes.php");
    }

    public function run(){
        echo __CLASS__ . " [OK] " . '<br>';
        $arr = explode('/' , $_SERVER['REQUEST_URI']);
        echo $_SERVER['REQUEST_URI'] . '<br>';
        echo "-----------------------------------" . '<br>';
        if($route = Router::get($_SERVER['REQUEST_URI']) != null) {
            echo "Custom route found<br>";
            $class = 'Controller\\' . ucfirst($arr[2]) . "Controller";
            $methods = $arr[3] . "Action";
            echo "$class -> $methods<br>";
            if (class_exists($class)) {
                if (method_exists($class, $methods)) {
                    $controller = new $class();
                    $controller->$methods();
                }else {
                    echo "fail method 1";
                }
            }else {
                echo "fail class 1";
            }
        }else {   
            if (isset($arr[2]) && isset($arr[3])) {
                $classe = 'Controller\\' . ucfirst($arr[2]) . "Controller";
                $method = $arr[3] . "Action";
                echo "$classe -> $method<br>";
                if (class_exists($classe)) {
                    if (method_exists($classe, $method)) {
                        $controller = new $classe();
                        $controller->$method();
                    }else {
                        echo "fail method 2";
                    }
                }else {
                    echo "fail class 2";
                }
            }
        }
    }
}
