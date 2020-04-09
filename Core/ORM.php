<?php
namespace Core;

class ORM{

    public $email;
    public $password;
    public static $_table;
    public static $attribut;


    public static function create($_table, $attribut) {
        echo "[OK] dans la function create de ORM.php<br>";
        echo '<pre style="color: red;">', var_dump(self::$_table), '</pre>' . '<br>';
        echo '<pre style="color: blue;">', var_dump(self::$attribut), '</pre>';
        $sql = Databases::getDb()->prepare("INSERT INTO self::$_table (email, password) VALUES (:mail , :pwd)");
        $sql->execute(array(':mail' => $_POST["email"], ':pwd' => $$_POST["password"]));

    }

    public static function read($_table, $id) {
        $readAccount =  self::$_pdo->prepare("SELECT * FROM $_table WHERE id = $id");
        $readAccount->execute();
        $array = $readAccount->fetch(PDO::FETCH_ASSOC);
        return $array; 
    }

    public static function update($_table, $id, $params) {
        $updateAccount = self::$_pdo->prepare("UPDATE $_table SET email = ?, password = ? WHERE id = $id");
        $updateAccount->execute(array($email, $password));
    }

    public static function delete($_table, $id) {
        $deleteAccount = self::$_pdo->prepare("DELETE FROM $_table WHERE id = $id");
        $deleteAccount->execute();
    }
    public static function connect ($_table) {
        $connectAccount = self::$_pdo->prepare("SELECT * FROM $_table WHERE email = ? AND password = ?");
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
