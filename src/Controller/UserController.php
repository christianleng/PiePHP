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
        $postsecurise = \Core\Request::security($_POST);
        echo '<pre>', var_dump($postsecurise), '</pre>';

        $params = $this->_request->security() ;
        $user = new \Model\UserModel($params) ;
        $user->save();
        if (!$user->id)  {
            $user->save();
            self::$_render = "Votre compte a ete cree." . '<br>' ;
        }

    }
    public function indexAction () {
    
    }

    public function loginAction () {

    } 

    public function showAction() {

    }

}


