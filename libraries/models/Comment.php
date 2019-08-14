<?php

require_once('libraries/models/Connexion.php');

class Comment extends Connexion
{
    protected $table = "Comments"; //appelee par la fonction find() de la classe Connexion

    /**
     * Retourne la liste des commentaire d1 article
     * 
     * @param integer $article_id
     * @return array
     */    
    public function findAllComments($article_id)
    {
    

        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll(); // fetchAll retourne un tableau

        return $commentaires;   
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
