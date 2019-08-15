<?php

/**
 * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !
 * 
 * On va donc se connecter à la base de données, récupérer les articles du plus récent au plus ancien (SELECT * FROM articles ORDER BY created_at DESC)
 * puis on va boucler dessus pour afficher chacun d'entre eux
 */
require_once('libraries/database.php'); // interaction avec  la base de donnee
require_once('libraries/utils.php'); // appel des vues
require_once('libraries/models/Article.php');// La class "Article.php" aulieu de la bib "database.php"
require_once('libraries/models/User.php');


/**
 * TEST: Application de findAll() sur l'Objet models/User.php
 
  $userModel = new User();
  $users = $userModel->findAll();

  var_dump($users);
  dies();
 */



// Application de findAll() sur l'Objet models/Article.php
$model = new Article(); 
$articles = $model->findAll(); 


// Affichage
$pageTitle = "Accueil";
render_index( compact( 'pageTitle' ,'articles'  )); 






