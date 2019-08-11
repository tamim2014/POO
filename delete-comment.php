<?php

/**
 * DANS CE FICHIER ON CHERCHE A SUPPRIMER LE COMMENTAIRE DONT L'id EST PASSE EN PARAMETRE GET !
 * 
 * On va donc vérifier que le paramètre "id" est bien présent en GET, qu'il correspond bien à un commentaire existant
 * Puis on le supprimera !
 */

require_once('libraries/database.php');
require_once('libraries/utils.php');
/**
 * 1. Récupération de l' "id" du paramètre en GET
 */
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ! Fallait préciser le paramètre id en GET !");
}

$id = $_GET['id'];


/**
 * 2. Connexion à la base de données avec PDO
 * Attention, on précise ici deux options :
 * - Le mode d'erreur : le mode exception permet à PDO de nous prévenir violament quand on fait une connerie ;-)
 * - Le mode d'exploitation : FETCH_ASSOC veut dire qu'on exploitera les données sous la forme de tableaux associatifs
 * 
 * PS : Vous remarquez que ce sont les mêmes lignes que pour l'index.php ?!
 */
$pdo = getPDO();

/**
 * 3. Vérification de l'existence du commentaire
 */

$commentaire = findComment($id);
if (!$commetaire) {
    die("Aucun commentaire n'a l'identifiant $id !");
}

/**
 * 4. Suppression réelle du commentaire
 * On récupère l'identifiant de l'article avant de supprimer le commentaire
 */

$commentaire = $query->fetch();
$article_id = $commentaire['article_id'];

deletComment($id);

/**
 * 5. Redirection vers l'article en question
 * 
 *  redirect("Location: article.php?id=" . $article_id);
 */

 header("Location: article.php?id=" . $article_id);
 exit();


