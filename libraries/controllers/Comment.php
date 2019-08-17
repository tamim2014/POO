<?php

namespace Controllers;

require_once('libraries/utils.php');
require_once('libraries/controllers/Constructeur.php'); // on a mis le constructeur ici
require_once('libraries/models/Article.php');// La class "Article.php" aulieu de la bib "database.php"
require_once('libraries/models/Comment.php');// La class "Comment.php" aulieu de la bib "database.php"


class Comment extends Constructeur
{

    protected $modelName = \Models\Comment::class;   // "\Models\Comment";

    public function insert(){

        $articleModel = new \Models\Article();

        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }


        $content = null;
        if (!empty($_POST['content'])) {

            $content = htmlspecialchars($_POST['content']);
        }


        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
            $article_id = $_POST['article_id'];
        }


        if (!$author || !$article_id || !$content) {
            die("Votre formulaire a été mal rempli !");
        }


        $pdo = getPDO();


        $article = $articleModel->find($article_id);


        if (!$article) {
            die("Ho ! L'article $article_id n'existe pas boloss !");
        }

        $this->model->insertComment($author, $content, $article_id);

      
       // redirect('Location: article.php?id='.$article_id);
         header('Location: article.php?id=' . $article_id);  exit();
       
    }

    public function delete(){

        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];


        $pdo = getPDO();

        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        $article_id = $commentaire['article_id'];
        $this->model->delete($id); 
        
      /**
       *  sur la page article.php la fonction redirect() ne fonctionne pas
       *  ni apres ajou d1 commentaire, ni apres la supression d1 commentaire
       * 
       *  redirect("Location: article.php?id=" . $article_id);
       */
   
       header("Location: article.php?id=" . $article_id); exit();
        


    }

}