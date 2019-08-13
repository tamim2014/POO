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

$model = new Article(); //instance de la class Article


/**
* 1. Connexion à la base de données:  getPDO() dans la function findAllArticles()
* 2. Récupération des articles
*
* cf database.php  sinon la classe  models/Article.php
*/

//$articles = findAllArticles(); //cf database.php
$articles = $model->findAllArticles(); //cf la classe  models/Article.php

/**
* 3. Affichage
*/
$pageTitle = "Accueil";
render_index( compact( 'pageTitle' ,'articles'  )); // vue de la page d'accueil: index.html.php

