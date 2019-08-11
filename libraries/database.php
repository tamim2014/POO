<?php


/**
* Return une connexion a la base de donnee
*
* @return PDO
*/

function getPDO()
{ 
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $pdo;
}

/**
* Retourne la liste des aricles classes par date 
*
* @return array
*/

function findAllArticles()
{
    $pdo = getPDO();
    // On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
    $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
    // On fouille le résultat pour en extraire les données réelles
    $articles = $resultats->fetchAll();

    return $articles;
}

/**
 * 
 * function findArticle(int $id): on lui envoi un identifiant et il retourne l'article correspondant
 * je supprimme la specfication de type. pour eviter l'erreur suivante:
 * Catchable fatal error: Argument 1 passed to findArticle() must be an instance of int, integer given
 * 
 */

function findArticle($id)
{
    $pdo = getPDO();

    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);
    // On fouille le résultat pour en extraire les données réelles de l'article
    $article = $query->fetch();

    return $article;

}

function findAllComments($article_id)
{
    $pdo = getPDO();

    $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $article_id]);
    $commentaires = $query->fetchAll(); // fetchAll retourne un tableau

    return $commentaires;
    
}



?>