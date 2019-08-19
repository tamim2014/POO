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

    // upload_photo/SaveEtudiant.php
    public function newarticle(){
        $articleModel = new \Models\Article(); 

        $title = null;
        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
        }

        $slug = null;
        if (!empty($_POST['slug'])) {
            $slug = $_POST['slug'];
        }

        $introduction = null;
        if (!empty($_POST['introduction'])) {
            $introduction = $_POST['introduction'];
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        }

        $created_at = null;
        if (!empty($_POST['created_at'])) {
            $created_at = $_POST['created_at'];
        }
          
        //1.On specifie le nom du fichier
         
        $nomPhoto = null;
        if (!empty($_POST['photo'])) {
            $nomPhoto = $_FILES['photo']['name'];//$_FILES['name de l'input']['name du fichier à importer']           
        }
        //2.On spécifie le chemin du fichier
        $fichierTempo = null;
        if (!empty($_FILES['photo'])) {
           $fichierTempo = $_FILES['photo']['tmp_name'];// $_FILES['name de l'input']['path du ficher ']
    }
        //3.On importe le fichier
        move_uploaded_file($fichierTempo,'./img/'.$nomPhoto);

        $this->model->insertArticle( $title, $slug, $introduction, $content, $created_at, $nomPhoto ); 


        //Redirection 
        //header("location:index.php");  exit();          
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
         */
        
        \Http::redirect("index.php");
    }
}