<?php
namespace Core;

class Entity{
    
    public $attribut;
    public $reAtttribut;
    public $_table;

    public function __construct($params) {
        $nameClass = get_class($this);
        $this->_table = str_replace('model', '', stripslashes(strtolower($nameClass))) . "s";
       
        if (array_key_exists('id', $params)) {
            $this->getAllAttributes(ORM::read($this->_table, $params));
        } else {
            $this->getAllAttributes($params);
        }

        $allAttribut = get_object_vars($this);
        $this->attribut = $allAttribut;

    }

    public function getAllAttributes($params) {
        foreach ($params as $key => $value) {
            $this->key = $value;
        }
    }

    public function create($_table, $attribut, $params) {
        return \Core\ORM::create($this->_table, $this->attribut, $params);
    }
    
    public function read($id) {
        return \Core\ORM::read($this->_table, $this->attribut);
    }

    public function update($_table, $attribut, $params) {
        return \Core\ORM::update($this->_table, $this->attribut);
    }

    public function delete ($id) {
        return \Core\ORM::delete($this->_table, $this->attribut);
    }

}
