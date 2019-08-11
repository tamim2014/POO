<?php

/**
 * DANS CE FICHIER, ON CHERCHE A SUPPRIMER L'ARTICLE DONT L'ID EST PASSE EN GET
 * 
 * Il va donc falloir bien s'assurer qu'un paramètre "id" est bien passé en GET, puis que cet article existe bel et bien
 * Ensuite, on va pouvoir effectivement supprimer l'article et rediriger vers la page d'accueil
 */
require_once('libraries/database.php');
require_once('libraries/utils.php');
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

$article = findArticle($id);
if (!$article) {
    die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
}

/**
 * 4. Réelle suppression de l'article (cet appel fait une connexion avant la suppressio. logique non? tu m'etonnes!!!)
 */

deleteArticle($id);

/**
 * 5. Redirection vers la page d'accueil
 * 
 * redirect("index.php");  -------------pourquoi cette fonction bug ?
 *                         -----------parce qu'il fallait pas specifier de type dans l'rgument de la fonction lors de sa definition
 */
 
header("Location: index.php");
exit();

