<?php


try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=MVC_PiePHP;charset=utf8', 'root', 'root',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>