<?php
namespace Core;

class ORM{

    public $email;
    public $password;
    public $_tables;


    public function __construct() {    
    }

    public function create($_tables, $params) {
        $db = \Core\Database::getDb(self::$_pdo);
        $requete = $db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $requete->execute(array($email, $password));

        // $reqMail = self::$_pdo->prepare('SELECT * FROM $tables WHERE email = ?');
        // $reqMail->execute(array($email));
        // $rowCountMail = $reqMail->rowCount();
        // if($rowCountMail == 0){
        //     $reqUserName = self::$_pdo->prepare('SELECT * FROM $tables WHERE username = ?');
        //     $reqUserName->execute(array($userName));
        //     $rowCountUserName = $reqUserName->rowCount();
        //     if($rowCountUserName == 0){
        //         $requete = self::$_pdo->query("INSERT INTO $tables (email, password) VALUE(?, ?);");
        //         $requete->execute(array($email, $password));
        //     }
        //     else{
        //         echo 'Fail INSERT';
        //     }
        // }
        // else{
        //     echo 'fail SELECT';
        // }
    }

    public function read($table, $id) {
        $readAccount =  self::$_pdo->prepare("SELECT * FROM $table WHERE id = $id");
        $readAccount->execute();
        $array = $readAccount->fetch(PDO::FETCH_ASSOC);
        return $array; 
    }

    public function update($table, $id, $fields) {
        $updateAccount = self::$_pdo->prepare("UPDATE $tables SET email = ?, password = ? WHERE email = ?");
        $updateAccount->execute(array($email, $password));
    }

    public function delete($table, $id) {
        $deleteAccount = self::$_pdo->prepare("DELETE FROM $tables WHERE email = ?");
        $deleteAccount->execute();
    }
    public function connect () {
        $connectAccount = self::$_pdo->prepare("SELECT * FROM $tables WHERE email = ? AND password = ?");
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
