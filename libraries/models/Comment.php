<?php

require_once('libraries/database.php');

class Comment{

private $pdo;
public function __construct()
{
    $this->pdo = getPDO();
}

/**
 * Retourne la liste des commentaire d1 article
 * 
 * @param integer $article_id
 * @return array
 */    
public function findAllComments($article_id)
{
  

    $query = $ths->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $article_id]);
    $commentaires = $query->fetchAll(); // fetchAll retourne un tableau

    return $commentaires;   
}

// Avant supprimer 1 article:  verfier s'il existe 

/**
 *  Retourne un commentaire de la base de donnees grace a son identifiant
 * 
 * @param integer $id
 * @return array|bool le commentaire si on le trouve, false si on ne le trouve pas
 */
public function findComment($id)
{

    $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);

    $comment = $query->fetch();// tjrs stocker le resultat de la requette $query, avant de la retourner.
    return  $comment;
}

/**
 *  Supprime un commentaire grace a son identifiant
 * 
 * @param integer $id
 * @return void
 */
public function deletComment($id)
{
   
    $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);

}

/**
 *  Insere un commentaire dans la base de donnees
 * 
 * @param string $author
 * @param string $content
 * @param integer $article_id
 * 
 * @return void
 */
function insertComment($author,$content,$article_id)
{
   
    $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(compact('author', 'content', 'article_id'));
}


}
