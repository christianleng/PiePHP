<?php
namespace Core;

class Controller {

    private static $_render;

    protected function render ($view, $scope = []) {
        extract($scope);
        $template = implode (DIRECTORY_SEPARATOR,[dirname(__DIR__), 'src', 'View', str_replace ('Controller', '', basename(get_class($this))), $view]) . '.php';
        if (file_exists($template)) {
            ob_start();
            include ($template);
            $view = ob_get_clean();
            ob_start () ;
            include (implode(DIRECTORY_SEPARATOR,[dirname(__DIR__), 'src', 'View', 'index']) . '. php ') ;
            self::$_render = ob_get_clean();
        }
    }
    
}
