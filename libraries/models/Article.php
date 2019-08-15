<?php

/**
 * Quant il s'agit d'acces aux donnees on parle de "model de donnees"
 * 
 * On va mettre les fonction de la bib database.php
 * dans la class Article
 * 
 * Des qualificateurs d'acces prefixent donc  les fonctions
 */

 require_once('libraries/models/Connexion.php'); // appel getPDO()

class Article extends Connexion
{
    protected $table = "articles"; //appelee par la fonction find() de la classe Connexion

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



}