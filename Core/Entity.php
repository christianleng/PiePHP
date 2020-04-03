<?php

namespace Core;

abstract class Entity {
// Une classe abstract est une classe qui ne peut pas etre instanciee 
    private $table;
    public $values;
    public $params;

    public function __construct($params, $values = []) {
        $class = get_class($this);
        if (array_key_exists('id', $params) && count($params > 0)) {
            ORM::read($this->table, $params['id']);
        } else {
            ORM::read($params);
        }
    }

}


