<?php
namespace Core;

class ORM{

    public static $_pdo;

    
    public static function create($_table, $attribut, $params) {

        $maKey = array_keys($params);
        $mesValues = array_values($params);
        
        $mesValuesDeux = str_replace(', Valider', '',  implode(', ', $mesValues));
        $laSecurite = str_replace($mesValues, '? ', $mesValuesDeux);

        $sql = Databases::getDb()->prepare('INSERT INTO '.$_table.' ('.str_replace(', submit', '',  implode(', ', $maKey)).') VALUES ('.$laSecurite.')');
        $sql->execute(array($mesValuesDeux));

    }

    public static function read($_table, $id) {
        $readAccount =  $this->_pdo->prepare("SELECT * FROM $_table WHERE id = $id");
        $readAccount->execute();
        $array = $readAccount->fetch(PDO::FETCH_ASSOC);
        return $array; 
    }

    public static function update($_table, $attribut, $params) {
        $updateAccount = $this->_pdo->prepare("UPDATE $_table SET email = ?, password = ? WHERE id = $id");
        $updateAccount->execute(array($email, $password));
    }

    public static function delete($_table, $id) {
        $deleteAccount = $this->_pdo->prepare("DELETE FROM $_table WHERE id = $id");
        $deleteAccount->execute();
    }
    public static function connect ($_table, $attribut, $params) {
        $connectAccount = $this->_pdo->prepare("SELECT * FROM $_table WHERE email = ? AND password = ?");
        $connectAccount->execute(array($email, $password));
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

}
