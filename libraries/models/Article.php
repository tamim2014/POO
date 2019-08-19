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



 require_once('templates/articles/addArticle.html.php');
 //require_once('templates/layout.html.php'); // c'est ce qui affiche le menu de gauche

class Article extends Connexion
{
    protected $table = "articles"; //appelee par la fonction find() de la classe Connexion

    public function insertArticle($title, $slug, $introduction, $content, $created_at, $nomPhoto)
    {
       
    
        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, slug = :slug, introduction = :introduction, content = :content, created_at = NOW(), photo = :nomPhoto');
        @$query->execute(compact('title', 'slug', 'introduction', 'content', 'creted_at', 'nomPhoto' ));
        
    }


}