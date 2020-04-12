<?php
namespace Controller;

class UserController extends \Core\Controller{
    
    public function viewregisterAction() {
        echo self::render("register");
    } 
    
    public function viewloginAction() {
        echo self::render("login");
    }

    public function viewindexAction() {
        echo self::render("index");
    }
    
    public function viewshowAction() {
        echo self::render("show");
    }

    public function registerAction() {
        $params = \Core\Request::security($_POST);
        $user = new \Model\UserModel($params);
        if (!isset($user->id))  {       
            $user->save($params);
        }
    }

    public function loginAction () {
        $params = \Core\Request::security($_POST);
        $user = new \Model\UserModel($params);
        if (!isset($user->id))  {       
            $user->login($params);
        }
    } 

    public function indexAction () {

    }

    public function showAction() {

    }

}
