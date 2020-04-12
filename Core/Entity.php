<?php
namespace Core;

class Entity{
    
    public  $attribut;
    public $reAtttribut;
    public  $_table;

    public function __construct($params) {

        $nameClass = get_class($this);
        $this->_table = str_replace('model', '', stripslashes(strtolower($nameClass))) . "s";
        if (array_key_exists('id', $params)) {
            echo '<pre style="color: teal;">', var_dump(ORM::read($this->_table, $params)), '</pre>';
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
        echo "bonjour Entity [OK]";
        return \Core\ORM::create($this->_table, $this->attribut, $params);
    }
    
    public function login ($_table, $attribut, $params) {
        return \Core\ORM::login($this->_table, $this->attribut, $params);
    }

    public function read_all($_table, $attribut, $params) {
        return \Core\ORM::read_all($this->_table, $this->attribut, $params);
    }

    public function update($id) {
        return \Core\ORM::update($this->_table, $this->attribut);
    }

    public function delete ($id) {
        return \Core\ORM::delete($this->_table, $this->attribut);
    }

}
