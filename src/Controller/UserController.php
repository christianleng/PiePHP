<?php
namespace Controller;

class UserController extends \Core\Controller{

    public function appAction() {
        echo "UserController/addAction [OK]";
    }

    public function salutAction () {
        echo "j'ai reussi la route static [OK] / salutAction";
    }
    public function bonjourAction () {
        echo "j'ai reussi la route static [OK] / bonjourAction";
    }
    public function indexAction () {
        echo "UserController/indexAction [OK]";
        self::render("index");
    }

    public function registerAction() {
        echo "UserController/registerAction [OK]";
        echo self::render("register");
    }

    public function loginAction () {
        echo "UserController/loginAction [OK]";
        echo self::render("login");
    } 
    public function showAction() {
        echo "UserController/showAction [OK]";
        echo self::render("show");
    }

}
