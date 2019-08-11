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



?>