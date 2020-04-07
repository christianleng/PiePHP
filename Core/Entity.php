<?php

namespace Core;

class Entity {

    public $params;
    public $tableau;
    public $attribut;
    public $reAtttribut;
    public $table;

    public function __construct($params, $tableau = []) {

        $table = str_replace('UserModel', 'users', trim(stripslashes(strlolower(get_class($this)))));
        if (array_key_exists('id', $params) && count($params > 0)) {
            // Soit j'ai un id
            $this->getAllAttributes(ORM::read($table, $params));
        } else {
            // Soit un tableau associatif
            $this->getAllAttributes($params);
        }

        // Créer pour chaque attribut fourni dans le tableau associatif un attribut public dont le nom sera fourni
        // par la clé et la valeur fourni par la valeur de l’entrée du tableau.
        $att = get_object_vars($this);
        $reAttribut = $tableau;
    }

    public function getAllAttributes($params) {
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function create($table, $params) {
        echo "bonjourdosghu"; 
        return \Core\ORM::create($table, $params);
    }
    
    public function read($id) {
        return \Core\ORM::read($table, $params);
    }

    public function update($id) {
        return \Core\ORM::update($table, $params);
    }

    public function delete ($id) {
        return \Core\ORM::delete($table, $params);
    }
}
 
