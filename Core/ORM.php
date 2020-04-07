<?php
namespace Core;

class ORM{

    public $email;
    public $password;
    public $tables;
    public $table;

    public function __construct() {
        $email = $_POST["email"];
        $password = $_POST["password"];
    }
    /*
    foreach($params as $key => $value) {
        echo '<br>' . "La valeur :" . $value . '<br>';
        // echo "----------------";
        echo '<br>' . "La Key :" . $key . '<br>'; 
    }

    echo '<pre>', var_dump($key), '</pre>';
    echo '<pre>', var_dump($value), '</pre>';
    echo '<pre>', var_dump($params), '</pre>';
    */
    public static function create($table) {
        echo "bonjour";
        echo '<pre>', var_dump($table), '</pre>' . '<br>';
        echo '<pre>', var_dump($params), '</pre>';
        $sql = Databases::getDb()->prepare("INSERT INTO $table (email, password) VALUES (:mail , :pwd)");
        $sql->execute(array(':mail' => $email, ':pwd' => $password));

        // $reqMail = Databases::getDb()->prepare('SELECT * FROM $tables WHERE email = ?');
        // $reqMail->execute(array($email));
        // $reqUserName = Databases::getDb();
        // $rowCountMail = $reqMail->rowCount();
        // if($rowCountMail == 0){
        //     $reqUserName = Databases::getDb()->prepare('SELECT * FROM $tables WHERE username = ?');
        //     $reqUserName->execute(array($userName));
        //     $rowCountUserName = $reqUserName->rowCount();
        //     if($rowCountUserName == 0){
        //         $requete = Databases::getDb()->prepare("INSERT INTO $tables (email, password) VALUE(?, ?);");
        //         $requete->execute(array($email, $password));
        //     }
        //     else{
        //         echo 'Fail INSERT';
        //     };
        // }
        // else{
        //     echo 'fail SELECT';
        // }
    }

    public static function read($table, $id) {
        $readAccount =  Databases::getDb()->prepare("SELECT * FROM $table WHERE id = $id");
        $readAccount->execute();
        $array = $readAccount->fetch(PDO::FETCH_ASSOC);
        return $array; 
    }

    public static function update($table, $id, $params) {
        $updateAccount = Databases::getDb()->prepare("UPDATE $table SET email = ?, password = ? WHERE id = $id");
        $updateAccount->execute(array($email, $password));
    }

    public static function delete($table, $id) {
        $deleteAccount = Databases::getDb()->prepare("DELETE FROM $table WHERE id = $id");
        $deleteAccount->execute();
    }
    public static function connect ($table) {
        $connectAccount = Databases::getDb()->prepare("SELECT * FROM $table WHERE email = ? AND password = ?");
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
