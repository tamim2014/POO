<?php

/**
 * Quant il s'agit d'acces aux donnees on parle de "model de donnees"
 * 
 * On va mettre les fonction de la bib database.php
 * dans la class Article
 * 
 * Des qualificateurs d'acces prefixent donc  les fonctions
 */

 require_once('libraries/database.php'); // appel getPDO()

class Article{
    private $pdo;
    public function __construct()
    {
        $this->pdo = getPDO();
    }
   /**
    * Retourne la liste des aricles classes par date 
    *
    * @return array
    */
public function findAllArticles()
{
    $pdo = getPDO();
    // On utilisera ici la méthode query (pas besoin de préparation car aucune variable n'entre en jeu)
    $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
    // On fouille le résultat pour en extraire les données réelles
    $articles = $resultats->fetchAll();

    return $articles;
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

public function findArticle($id)
{
    

    $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);
    // On fouille le résultat pour en extraire les données réelles de l'article
    $article = $query->fetch();

    return $article;
}

/**
 *  Supprime un article dans la base grace a son identifiant
 * 
 *  @param integer $id
 *  @return void
 */
function deleteArticle($id)
{
    
    $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);
}


}