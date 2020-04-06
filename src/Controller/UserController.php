<?php
namespace Controller;

class UserController extends \Core\Controller{
    
    public function viewregisterAction() {
        echo self::render("register");
    } 
     
    public function viewindexAction() {
        echo self::render("index");
 
    } 
    public function viewloginAction() {
        echo self::render("login");
     
    }
    public function viewshowAction() {
        echo self::render("show");
     
    }
 

    public function registerAction() {
        $params = \Core\Request::security($_POST);
        echo '<pre>', var_dump($params), '</pre>';

        $user = \Model\UserModel::save($params) ;
        if (!$user->id)  {       
            echo "[OK] DANS LE IF" . '<br>';
            $user->save();
            self::$_render = "Votre compte a ete cree." . PHP_EOL ;
        }   

    }
    public function indexAction () {
    
    }

    public function loginAction () {

    } 

    public function showAction() {

    }

}


