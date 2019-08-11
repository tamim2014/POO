<?php

/**
 * CE FICHIER A POUR BUT D'AFFICHER LA PAGE D'ACCUEIL !
 * 
 * On va donc se connecter à la base de données, récupérer les articles du plus récent au plus ancien (SELECT * FROM articles ORDER BY created_at DESC)
 * puis on va boucler dessus pour afficher chacun d'entre eux
 */
require_once('libraries/database.php'); // interaction avec  la base de donnee
require_once('libraries/utils.php'); // appel des vues


/**
* 1. Connexion à la base de données:  getPDO() dans la function findAllArticles()
* 2. Récupération des articles
*
* cf database.php 
*/

$articles = findAllArticles();

/**
* 3. Affichage
*/
$pageTitle = "Accueil";
render_index( compact( 'pageTitle' ,'articles'  )); // vue de la page d'accueil: index.html.php

