<?php

namespace Controllers;


require_once('libraries/utils.php'); // appel des vues
require_once('libraries/models/Article.php');// La class "Article.php" aulieu de la bib "database.php"
require_once('libraries/models/Comment.php');
require_once('libraries/models/User.php');

class Article {

    protected $model;

    public function __construct(){
        $this->model = new  \Models\Article();
    }


    public function index(){
        /**
         * 
         * TEST: Application de findAll() sur l'Objet models/User.php
         *       
            $userModel = new User();
            $users = $userModel->findAll();

            var_dump($users);
            dies();
        *    
        */

        // Application de findAll() sur l'Objet models/Article.php
        $articles = $this->model->findAll(); 
        // Affichage
        $pageTitle = "Accueil";
        render_index( compact( 'pageTitle' ,'articles'  )); 
    }

    public function show(){

        $commentModel = new \Models\Comment();

        //1. Récupération du param "id" et vérification de celui-ci 
        
        $article_id = null; // On part du principe qu'on ne possède pas de param "id"
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id']; // $_GET['id'] : id transmis par index.html.php 
        }
        if (!$article_id) { die("Vous devez préciser un paramètre `id` dans l'URL !"); }
            
        /**
         *  2.Connexion à la base de données 
         *  3.Récupération de l'article en question
         *     $article = find($article_id); // tableau contenant tous les champs d1 article ( cf libraries/database.php )
         *  4.Récupération des commentaires de l'article en question
         *     $commentaires = findAllComments($article_id); // tableau contenant tous les champs d1 commentaire ( cf libraries/database.php )
         *  5. On affiche 
         */

        $article = $this->model->find($article_id); //2. et 3. tableau contenant tous les champs d1 article ( cf libraries/models/Article.php )
        $commentaires =$commentModel->findAllComments($article_id);//4.

        $pageTitle = $article['title'];// 5.
        render_show( compact( 'pageTitle' ,'article' ,'commentaires' , 'article_id' ));// 5.               
    }

    public function delete(){

        /**
         * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         * 
         *  $_GET['id'] : id transmis par index.html.php 
         * 
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
        $id = $_GET['id'];
        /**
         * 2. Connexion à la base de données avec PDO
         * 3. Vérification que l'article existe bel et bien
         */
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }
        /**
         * 4. Réelle suppression de l'article (cet appel fait une connexion avant la suppressio. logique non? tu m'etonnes!!!)
         */
        $this->model->delete($id);
        /**
         * 5. Redirection vers la page d'accueil
         * 
         * redirect("index.php");  -------------pourquoi cette fonction bug ?
         *                         -----------parce qu'il fallait pas specifier de type dans l'rgument de la fonction lors de sa definition
         */
        header("Location: index.php");
        exit();       
    }
}