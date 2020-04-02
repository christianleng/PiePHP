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

        // echo '<pre>', var_dump($_POST), '</pre>';
        // echo "-------- PARTIE AVEC LA SECURISATION --------";
        $postsecurise = \Core\Request::security($_POST);
        echo '<pre>', var_dump($postsecurise), '</pre>';

        // 1 : securite des donnees (Request.php)
        // 2 : registerAction qui instancie les model en lui donnant les donnees qui sont securise grace a (Request.php)
        // 3 : appeller la function du model genre $obj = \Model\userModel($postsecurise); $odj->save();  
        // Voir a quoi va me SERVIRE -----> ENTITY <------

        // $postsecurise = $this->_request->getQueryParams () ;
        $user = new \Model\UserModel($postsecurise) ;
        $user->save();
        // if (!$user->id)  {
        //     $user->save();
        //     self::$_render = "Votre compte a ete cree." . PHP_EOL ;
        // }

    }
    public function indexAction () {
    
    }

    public function loginAction () {

    } 

    public function showAction() {

    }

}


