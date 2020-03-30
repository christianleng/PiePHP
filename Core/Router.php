<?php
namespace Core;

class Router{

    private static $routes;

    public static function connect($url, $route) {
        if (!isset(self::$routes[$url])) {
            self::$routes[$url] = $route;
        }
    }

    public static function get($url) {
        echo "<pre>", var_dump(self::$routes),  '</pre><br>';
        if(isset(self::$routes[$url]) && isset($url)){ 
            return self::$routes[$url]; 
        } else { 
            return false;
        }
    }
}