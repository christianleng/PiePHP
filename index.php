<?php

define('MVC_PiePHP' , str_replace('\ ','/',substr(__DIR__ ,strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR , ['Core','autoload.php']));

$app = new  CoreCore();
$app ->run();
