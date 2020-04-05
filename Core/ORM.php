<?php
namespace Core;

class ORM {

    private static $email;
    private static $password;
    
    public function __construct() {
        new \Core\Databases();
    }

    public function create($table) {
        get_called_class($this);
        $requete = self::$_pdo->prepare("INSERT INTO $ables (email, password) VALUE(?, ?)");
        $requete->execute(array($email, $password));
    }

    public function read($table, $id) {
        $readAccount =  self::$_pdo->prepare("SELECT * FROM $table WHERE id = $id");
        $readAccount->execute();
        $array = $readAccount->fetch(PDO::FETCH_ASSOC);
        return $array; 
    }

    public function update($table, $id, $fields) {
        $updateAccount = self::$_pdo->query("UPDATE $tables SET email = ?, password = ? WHERE email = ?");
        $updateAccount->execute(array($email, $password));
    }

    public function delete($table, $id) {
        $deleteAccount = self::$_pdo->query("DELETE FROM $tables WHERE email = ?");
        $deleteAccount->execute();
    }
    
    public function connect ($tales) {
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
