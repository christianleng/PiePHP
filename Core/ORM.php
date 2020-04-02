<?php
namespace Core;

class ORM {

    private static $email;
    private static $password;
    
    public function __construct() {
        new \Core\Databases();
    }

    public function create(/*$table, $fields*/) {
        get_called_class($this);
        $requete = self::$_pdo->query("INSERT INTO users (email, password) VALUE(?, ?)");
        $requete->execute(array($email, $password));

        // $reqMail = self::$_pdo->prepare('SELECT * FROM users WHERE email = ?');
        // $reqMail->execute(array($email));
        // $rowCountMail = $reqMail->rowCount();
        // if($rowCountMail == 0){
        //     $reqUserName = self::$_pdo->prepare('SELECT * FROM users WHERE username = ?');
        //     $reqUserName->execute(array($userName));
        //     $rowCountUserName = $reqUserName->rowCount();
        //     if($rowCountUserName == 0){
        //         $requete = self::$_pdo->query("INSERT INTO users (email, password) VALUE(?, ?);");
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
        $readAccount =  self::$_pdo->prepare("SELECT * FROM users");
        $readAccount->execute();
        $array = $readAccount->fetchAll(PDO::FETCH_ASSOC);
        return $array; 
    }

    public function update($table, $id, $fields) {
        $updateAccount = self::$_pdo->query("UPDATE users SET email = ?, password = ? WHERE email = ?");
        $updateAccount->execute(array($email, $password));
    }

    public function delete($table, $id) {
        $deleteAccount = self::$_pdo->query("DELETE FROM users WHERE email = ?");
        $deleteAccount->execute();
    }
    
    public function find ($table, $params = array (
        'WHERE' => 1,
        'ORDER BY' => 'id desc',
        'LIMIT' => ''
    )) {

    }
}


/*
public function read_all () {
    $pdo->query();
}

public function connect () {
    $connectAccount = self::$_pdo->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
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
*/