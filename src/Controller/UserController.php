<?php
namespace Controller;

class UserController extends \Core\Controller{

    public function appAction() {
        echo "UserController/addAction [OK]";

    }

    public function indexAction () {
        echo "UserController/indexAction [OK]";
        $users = UserModel::readAll();
        echo self::render("index",[$users]);
    }


    public function registerAction() {
        echo "UserController/registerAction [OK]";
        $users = UserModel::readAll();
        echo self::render("register", [$users]);
    }

    public function salutAction () {
        echo "j'ai reussi la route static [OK]";
    }
}
