<?php

namespace Core;

class Entity {

    public $params;
    public $table;

    public function __construct($params, $table) {

        $table = str_replace('model', '', trim(stripslashes(strlolower(get_class($this)))));
        if (array_key_exists('id', $params) && count($params > 0)) {
            // Soit j'ai un id
            $this->getAllAttributes(ORM::read($table, $params['id']));
        } else {
            // Soit un tableau associatif
            $this->getAllAttributes($params);
        }
    }

    public function getAllAttributes($params) {
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }

    public function create() {
        return ORM::create($table, $params);
    }
    
    public function read($id) {
        return ORM::read($table, $params);
    }

    public function update($id) {
        return ORM::update($table, $params);
    }

    public function delete ($id) {
        return ORM::delete($table, $params);
    }

    // public function find ($id) {
    //     return ORM::find($table, $id ,$params);
    // }
}
 
