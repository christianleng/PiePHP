<?php
namespace Core;

class Request {

    public static function security($array) {
        
        foreach($array as $key => $val) {
            $array[$key] = htmlspecialchars($val);
        }
        return $array;
    }

}