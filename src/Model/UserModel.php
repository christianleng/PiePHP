<?php
namespace Model;

class UserModel extends \Core\Entity{

    // public $email;
    // public $password;
    public static $_table;
    public static $attribut;


    public static function save($params) {
        echo "save de UserModel[OK]<br>";
        echo '<pre style="color: green;">', var_dump(self::$attribut), '</pre>';
        echo '<pre style="color: violet;">', var_dump(self::$_table), '</pre>';
        return \Core\ORM::create(self::$_table, self::$attribut);

    }
 
}
