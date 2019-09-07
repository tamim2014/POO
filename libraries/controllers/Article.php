<?php

namespace Controllers;

class Article extends Constructeur
{

    protected $modelName = \Models\Article::class;   // "\Models\Article";


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
        @\Renderer::render_index( compact( 'pageTitle' ,'articles'  )); 
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
        @\Renderer::render_show( compact( 'pageTitle' ,'article' ,'commentaires' , 'article_id' ));// 5.               
    }
    // affiche le dernier article
    public function show_new(){

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
        @\Renderer::render_show( compact( 'pageTitle' ,'article' ,'commentaires' , 'article_id' ));// 5.               
    }

    public function delete(){

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
        $id = $_GET['id'];
   
        $article = $this->model->find($id); 
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }
     
        $this->model->delete($id); // connexion BD avant la suppression
           
        \Http::redirect("index.php");
    }

    public function edit(){
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
     
        $id = $_GET['id'];
   
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        } 
        
        $title = $article['title'];
        $slug = $article['slug'];
        $intro = $article['introduction'];
        $content = $article['content'];
        $created_at = $article['created_at'];
        $photo = $article['photo'];
        
     
        $this->model->edit($id, $title, $slug, $intro, $content, $created_at, $photo ); // connexion BD avant la modification    
        // \Http::redirect("index.php");
         
        
    }
}