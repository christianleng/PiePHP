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
        // self::render("index");
        // $user = new UserModel(["name" => "", "password" => ""]);
        // $user->role = "Membre";
        // $user->registerDate = Date();
        // $user->create();
    }
    
    
    public function viewregisterAction() {
        echo self::render("register");
    }
    

    
    public function registerAction() {
        // echo "UserController/registerAction [OK]";
        // echo self::render("register");
        echo '<pre>', var_dump($_POST), '</pre>';
        echo '<pre>', var_dump($post), '</pre>';
        $postsecurise = Request::security($_POST);       //securite des donne
        $obj = \Model\usermodel($post);                  //instencier les model en lui donnant les donne
        $obj->save();                                    //appeller la function du model  
        
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
