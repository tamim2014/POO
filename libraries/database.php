<?php


/**
* class static : on met le fnction getPDO() dans une classe
*/

class Database 
{

    private static $instance = null ; //design pattern singleton (une variable static s'appelle ainsi self::$nom )

   /**
    * Return une connexion a la base de donnee
    *
    * @return PDO
    */

    public static function getPDO()
    { 
        if(self::$instance === null){
            self::$instance = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]); // !!!!!!!!!!!!!!!!!!!!  connexion a la BD, seulement s'il n'a pas de connexion !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }    

        return self::$instance;
    }


}

















?>