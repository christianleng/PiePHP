<?php
namespace Model;

class UserModel extends \Core\Entity{

    public $email;
    public $password;

    public function save() {

        echo 'public function save() [OK] <br>';
        echo '<pre>', var_dump($postsecurise), '</pre><br>';
        return \Core\ORM::create($table);
        
    }
 
}

