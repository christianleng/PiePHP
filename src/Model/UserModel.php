<?php
namespace Model;

class UserModel extends \Core\Entity{

    public $_table;
    public $attribut;


    public function save($params) {
        return \Core\ORM::create($this->_table, $this->attribut, $params);
    }

    public function login($params) {
        return \Core\ORM::login($this->_table, $this->attribut, $params, $id);
    }

    public function read_all($params) {
        return \Core\ORM::login($this->_table, $this->attribut, $params, $id);
    }
}
