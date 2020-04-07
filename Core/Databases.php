<?php
namespace Core;
use \PDO;

class Databases{

    public static $_pdo;
    private static $_host;
    private static $_dbName;
    private static $_username;
    private static $_password;

    public function __construct() {

        self::$_host = "127.0.0.1"; 
        self::$_dbName = "MVC_PiePHP"; 
        self::$_username = "root"; 
        self::$_password = "root"; 

    }
    
    public static function getDb () {
        self::$_pdo = new PDO('mysql:host="'.self::$_host.'";dbname="'.self::$_dbName.'";charset=utf8'. '"'.self::$_username.'"'. '"'.self::$_password.'"'.
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return self::$_pdo;
    }

}
