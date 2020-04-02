<?php
namespace Core;

class Controller {

    private static $_render;
    private static $_request;

    public function __construc() {
        self::$_request = new \Core\Request($_POST, $_GET);
    }

    protected function render ($view, $scope = []) {
        extract($scope);

        $a = array('Controller\\', 'Controller');
        $b = "";
        
        $template = implode(DIRECTORY_SEPARATOR,[dirname(__DIR__), 'src', 'View', str_replace($a,$b,basename(get_class($this))), $view]) . '.php';
        if (file_exists($template)) {
            ob_start();
            require_once ($template);
            $view = ob_get_clean();
            ob_start () ;
            require_once (implode(DIRECTORY_SEPARATOR,[dirname(__DIR__), 'src', 'View', 'index.php'])) ;
            self::$_render = ob_get_clean();
        } else{
            echo "file not exist" . '<br>';
            echo $template. '<br>';
            echo __DIR__;
        }
    }

    public function __destruct() {
        echo self::$_render;
    }

}
