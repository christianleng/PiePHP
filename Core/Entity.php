<?php

namespace Core;

class Entity {

    protected $params;
    public $tables;

    public function __construct($params) {

        $tables = str_replace('model', '', trim(stripslashes(strlolower(get_class($this)))));
        
        if (array_key_exists('id', $params) && count($params > 0)) {
            $val = ORM::read($this->table, $params['id']);
        } else {
            $val = $params;
        }

    }

    public function getAllAttributes($params) {
        foreach ($params as $key -> $val) {
            $this->$key = $val;
        }
    }
    public function create() {
        return ORM::create($tables, $this->relation);
    }
    
    public function read($id) {
        return ORM::read($tables, $id, $this->relation);
    }

    public function update($id) {
        return ORM::update($tables, $id ,$this->relation);
    }

    public function delete ($id) {
        return ORM::delete($tables, $id ,$this->relation);
    }

    // public function find ($id) {
    //     return ORM::find($tables, $id ,$this->relation);
    // }
}
 
