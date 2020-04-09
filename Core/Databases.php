<?php
namespace Core;
use \PDO;

class Databases{

    public static $_pdo;
    private static $_host = "127.0.0.1"; 
    private static $_dbName = "MVC_PiePHP"; 
    private static $_username = "root"; 
    private static $_password = "root"; 

    
    public static function getDb () {
        try {
            self::$_pdo = new PDO('mysql:host='.self::$_host.';dbname='.self::$_dbName, self::$_username, self::$_password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
