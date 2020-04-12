<?php
namespace Core;

class ORM{

    public static $_pdo;

    public static function create($_table, $attribut, $params) {

        $maKey = array_keys($params);
        $mesValues = array_values($params);
        $last = array_pop($mesValues);

        $mesValuesDeux = str_replace(', Valider', '',  implode(', ', $mesValues));
        $laSecurite = str_replace($mesValues, '? ', $mesValuesDeux);

        $variable = 'INSERT INTO '.$_table.' ('.str_replace(', submit', '',  implode(', ', $maKey)).') VALUES ('.$laSecurite.')';
        $sql = Databases::getDb()->prepare($variable);

        if ($sql->execute($mesValues) == true){
            header('Location: /MVC_PiePHP/user/viewregister');
        }else {
            echo "Mot de passe et email incorrect.";
        }
    }

    public static function login ($_table, $attribut, $params, $id) {
        echo "[OK] login de ORM.php";

        $connectAccount = Databases::getDb()->prepare("SELECT * FROM $_table WHERE email = ?");
        $connectAccount->execute();

        $accountExist = $connectAccount->rowCount();
        if($accountExist == 1){
            $accountInfo = $connectAccount->fetch();
            $_SESSION['email']  = $accountInfo['email'];
            echo $_SESSION['email'];
        }
        else{
            echo "fail CONNECT";
        }
    }

    public static function read_all($_table, $attribut, $params) {

        $readAccount =  Databases::getDb()->prepare("SELECT * FROM $_table");
        if ($readAccount->execute() == true) {
            $array = $readAccount->fetch(PDO::FETCH_ASSOC);

            return $array;
        }else {
            echo "fail read_all";
        }

    }

    public static function update($_table, $id, $params) {
        $updateAccount = $this->_pdo->prepare("UPDATE $_table SET email = ?, password = ? WHERE id = $id");
        $updateAccount->execute(array($email, $password));
    }

    public static function delete($_table, $id) {
        $deleteAccount = $this->_pdo->prepare("DELETE FROM $_table WHERE id = $id");
        $deleteAccount->execute();
    }


}
