<?php

/**
 * Formalisation des fonctionnalites (actions utilisateur)
 * 
 * article.php :        affiche la liste des articles
 * delete-article.ph :  supprimer un article
 * save-comment.php :   enregistrer un commentaire
 * delete-comment.php : supprimer un commentaire
 * 
 */

class Application 
{
    public static function process(){
        $controllerName = "Article";
        $task = "index";
       
        if(!empty($_GET['controller'])){
            $controllerName = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['task'])){
            $task = $_GET['task'];
        }
        
        $controllerName = "\controllers\\".$controllerName;

        $controller = new  $controllerName(); // $controller = new   controllers/Article();
        $controller->$task();                 // $controller -> index();
    }

   
}