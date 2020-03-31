<?php

Core\Router::connect('/', ['controller' => 'app','action' => 'index']);
Core\Router::connect('/register', ['controller' => 'user','action' => 'add']);
Core\Router::connect('/MVC_PiePHP/user/salut', ['controller' => 'user','action' => 'filter']);
Core\Router::connect('/MVC_PiePHP/user/bonjour', ['controller' => 'user','action' => 'filter']);
echo "bonjour du routes.php" . '<br>';