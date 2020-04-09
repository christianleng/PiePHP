<?php
namespace Core;

class Entity{
    
    public static $attribut;
    public $reAtttribut;
    public static $_table;

    public function __construct($params, $tableau = [], $_table) {

        $leNom = get_class($this);
        self::$_table = str_replace('model', '', stripslashes(strtolower($leNom)));
        echo self::$_table;

        if (array_key_exists('id', $params) && count($params > 0)) {
            // Soit j'ai un id
            $this->getAllAttributes(ORM::read(self::$_table, $params));
        } else {
            // Soit un tableau associatif
            $this->getAllAttributes($params);
        }

        self::$attribut = get_object_vars($this);
        $reAttribut = $tableau;
    }

    public function getAllAttributes($params) {
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function create($_table, $attribut) {
        echo "bonjour Entity [OK]";
        return \Core\ORM::create(self::$_table, self::$attribut);
    }
    
    public function read($id) {
        return \Core\ORM::read($this->table, $this->attribut);
    }

    public function update($id) {
        return \Core\ORM::update($this->table, $this->attribut);
    }

    public function delete ($id) {
        return \Core\ORM::delete($this->table, $this->attribut);
    }

    // public function find ($id) {
    //     return ORM::find($table, $id ,$params);
    // }
}
