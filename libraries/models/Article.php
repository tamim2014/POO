<?php

namespace Models;

/**
 * Quant il s'agit d'acces aux donnees on parle de "model de donnees"
 * 
 * On va mettre les fonction de la bib database.php
 * dans la class Article
 * 
 * Des qualificateurs d'acces prefixent donc  les fonctions
 */

 //require_once('libraries/models/Connexion.php'); // appel getPDO()

 

class Article extends Connexion
{
    protected $table = "articles"; //appelee par la fonction find() de la classe Connexion

    public function insertArticle($title, $slug, $introduction, $content, $created_at, $nomPhoto)
    {
        require_once('templates/articles/addArticle.html.php');
        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, slug = :slug, introduction = :introduction, content = :content, created_at = NOW(), photo = :nomPhoto');
        $query->execute(compact('title', 'slug', 'introduction', 'content', 'creted_at', 'nomPhoto' ));
        
    }


}