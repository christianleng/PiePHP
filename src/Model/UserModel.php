<?php
namespace Model;

class UserModel extends Entity {

    private static $_email;
    private static $_password;
    
    public function create() {
        $reqMail = self::$pdo->prepare('SELECT * FROM user WHERE email = ?');
        $reqMail->execute(array($email));
        $rowCountMail = $reqMail->rowCount();
        if($rowCountMail == 0){
            $reqUserName = self::$pdo->prepare('SELECT * FROM users WHERE username = ?');
            $reqUserName->execute(array($userName));
            $rowCountUserName = $reqUserName->rowCount();
            if($rowCountUserName == 0){
                $requete = self::$pdo->query("INSERT INTO users (email, password) VALUE(?, ?);");
                $requete->execute(array($email, $password));
            }
            else{
                echo 'Fail INSERT';
            }
        }
        else{
            echo 'fail SELECT';
        }
    }

    public function read() {
        $readAccount =  self::$pdo->prepare("SELECT * FROM users");
        $readAccount->execute();
        $array = $readAccount->fetchAll(PDO::FETCH_ASSOC);
        return $array; 
    }

    public function update() {
        $updateAccount = self::$pdo->query("UPDATE users SET email = ?, password = ? WHERE email = ?");
        $updateAccount->execute(array($email, $password));
    }

    public function delete() {
        $deleteAccount = self::$pdo->query("DELETE FROM users WHERE email = ?");
        $deleteAccount->execute();
    }
    
    public function read_all () {
        $pdo->query();
    }
}
