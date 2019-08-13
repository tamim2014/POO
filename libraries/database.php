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
 * 
 * function findArticle(int $id): on lui envoi un identifiant et il retourne l'article correspondant
 * 
 * je supprimme la specfication de type. pour eviter l'erreur suivante:
 * Catchable fatal error: Argument 1 passed to findArticle() must be an instance of int, integer given
 * 
 * @param integer $id
 * @return void
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

function deleteArticle($id)
{
    $pdo = getPDO(); 
    $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);
}

// D'abord on verfie que le commentaire existe avant de le supprimer
function findComment($id)
{
    $pdo = getPDO();
    $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);

    $comment = $query->fetch();// tjrs stocker le resultat de la requette $query, avant de la retourner.
    return  $comment;
}

function deletComment($id)
{
    $pdo = getPDO();
    $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);

}

function insertComment($author,$content,$article_id)
{
    $pdo = getPDO();
    $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(compact('author', 'content', 'article_id'));

}



?>