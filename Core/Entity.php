<?php

namespace Core;

abstract class Entity {
// Une classe abstract est une classe qui ne peut pas etre instanciee 
    private $table;
    public $values;
    public $params;

    public function __construct($params, $values = []) {
        $class = get_class($this);
        if (array_key_exists('id', $params)) {
            ORM::read($this->table, $params['id']);
        } else {
            ORM::read($params);
        }
        /*
        Si params contient une key 'id'
            Instancier la classe avec read le ORM  ORM::read()  ///// UserModel::read()
        Sinon
            Instancie avec params

        */
        // Soit j'ai un id
        // Soit un tableau associatif
    } 

}


