<?php

namespace Models;
//require_once('libraries/autoload.php'); 
require_once('libraries/Database.php'); 
require_once('libraries/models/Connexion.php');


class UserClass extends Connexion
{
    /*User Login - Authentification - identification de l'utilisateur -s */
    public function userLogin($usernameEmail,$password)
    {
        try{
            //$this->pdo = getPDO();
            $this->pdo = \Database:: getPDO();
            $hash_password= hash('sha256', $password); //Password encryption 
            $stmt = $this->pdo->prepare("SELECT uid FROM users WHERE (username=:usernameEmail or email=:usernameEmail) AND password=:hash_password"); 
            $stmt->bindParam("usernameEmail", $usernameEmail) ;
            $stmt->bindParam("hash_password", $hash_password) ;
            $stmt->execute();
            $count=$stmt->rowCount();
            $data=$stmt->fetch();
            $this->pdo = null;
            if($count)
            {
                $_SESSION['uid']=$data->uid; // Storing user session value
                return true;
            }else {
                return false;     
            } 
        }catch(PDOException $e) {   
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    /* User Registration - Enregistrement de l'utilisateur */
    public function userRegistration($username,$password,$email,$name)
    {
    try{
        
        //$this->pdo = getPDO();
        
        $st = $this->pdo->prepare("SELECT uid FROM users WHERE username=:username OR email=:email"); 
        $st->bindParam("username", $username);
        $st->bindParam("email", $email);
        $st->execute();
        $count=$st->rowCount();
        if($count<1)
        {
            $stmt = $this->pdo->prepare("INSERT INTO users(username,password,email,name) VALUES (:username,:hash_password,:email,:name)");
            $stmt->bindParam("username", $username) ;
            $hash_password= hash('sha256', $password); //Password encryption
            $stmt->bindParam("hash_password", $hash_password) ;
            $stmt->bindParam("email", $email) ;
            $stmt->bindParam("name", $name) ;
            $stmt->execute();
            $uid=$this->pdo->lastInsertId(); // Last inserted row id
            $this->pdo = null;
            $_SESSION['uid']=$uid;
            return true;
        }
        else
        {
            $this->pdo= null;
            return false;
        }

    } 
    catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
    }

    /* User Details - Détails de l'utilisateur ???? */

    public function userDetails($uid)
    {
        try{
            //$this->pdo= getDB();
            $stmt = $this->pdo->prepare("SELECT email,username,name FROM users WHERE uid=:uid"); 
            $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}

