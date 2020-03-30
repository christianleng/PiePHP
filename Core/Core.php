<?php
namespace Core;

class Core {

    public function __construct() {
        require_once("src/routes.php");
    }

    public function run(){
        echo __CLASS__ . " [OK] " . '<br>';
        echo $_SERVER['REQUEST_URI'] . '<br>';
    
        $arr = explode('/' , $_SERVER['REQUEST_URI']);
        print_r($arr);
        echo  '<br>';
        echo $_SERVER['REQUEST_URI'] . '<br>';

        if(Router::get($_SERVER['REQUEST_URI']) != null) {

            echo "Custom route found<br>";
            echo $control;
            
        }else {   
            // SOIT ROUTER DYNAMIQUE(les routes dynamique devront finir par action)
            if (isset($arr[2]) && isset($arr[3])) {
                $classe = 'Controller\\' . ucfirst($arr[2]) . "Controller";
                $method = $arr[3] . "Action";
                echo "$classe -> $method<br>";
                if (class_exists($classe)) {
                    if (method_exists($classe, $method)) {
                        $controller = new $classe();
                        $controller->$method();
                    }else {
                        echo "fail method";
                    }
                }else {
                    echo "fail class";
                }
            }else {
                if (!class_exists($classe) && !method_exists($method)) {
                    echo "404";
                }
            }
        }
    }
}
