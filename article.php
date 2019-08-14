<?php

/**
 * CE FICHIER DOIT AFFICHER UN ARTICLE ET SES COMMENTAIRES !
 * 
 * On doit d'abord récupérer le paramètre "id" qui sera présent en GET et vérifier son existence
 * Si on n'a pas de param "id", alors on affiche un message d'erreur !
 * 
 * Sinon, on va se connecter à la base de données, récupérer les commentaires du plus ancien au plus récent (SELECT * FROM comments WHERE article_id = ?)
 * 
 * On va ensuite afficher l'article puis ses commentaires
 */
require_once('libraries/database.php');
require_once('libraries/utils.php');
require_once('libraries/models/Article.php');
require_once('libraries/models/Comment.php');

$articleModel = new Article();
$commentModel = new Comment();

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


$article = $articleModel->find($article_id); //2. et 3. tableau contenant tous les champs d1 article ( cf libraries/models/Article.php )
$commentaires =$commentModel->findAllComments($article_id);//4.

$pageTitle = $article['title'];// 5.
render_show( compact( 'pageTitle' ,'article' ,'commentaires' , 'article_id' ));// 5.
