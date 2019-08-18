<?php


/**
* class static : on met le fnction getPDO() dans une classe
*/

class Database 
{
   /**
    * Return une connexion a la base de donnee
    *
    * @return PDO
    */

    public static function getPDO()
    { 
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        return $pdo;
    }


}

















?>