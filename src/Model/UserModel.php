<?php
namespace Model;

class UserModel extends \Core\Entity{

    public $email;
    public $password;

    public function save() {

        echo 'public function save() [OK] <br>';
        echo '<pre>', var_dump($params), '</pre><br>';
        echo 'public function save() [OK] <br>';

        print_r($params) . '<br>';

        \Core\ORM::create($table, $params);
        
    }
 
}

