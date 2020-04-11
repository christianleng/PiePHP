<?php
namespace Model;

class UserModel extends \Core\Entity{

    public $_table;
    public $attribut;

    public function save($params) {
        return \Core\ORM::create($this->_table, $this->attribut, $params);
    }

}
