<?php
namespace Controller;

class UserController extends \Core\Controller{

    public static $_table;
    public static $attribut;

    
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
    public function deleteAction() {

    }
    public function detailAction() {
        
    }
    public function registerAction() {

        $params = \Core\Request::security($_POST);

        $user = new \Model\UserModel($params, $tableau = [], self::$_table);

        if (!$user->id)  {       
            echo "[OK] dans le if de UserController" . '<br>';
            $user->save($params, $tableau = [], self::$_table);
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
