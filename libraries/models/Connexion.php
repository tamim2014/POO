<?php

namespace Models;
/**
 * Cette classe est le model d'access aux donnees
 * Dailleurs Lior l'a applee  Model.php
 * 
 * require_once('libraries/database.php');| desormais se fait par autoloading
 */


abstract class Connexion {

    protected $pdo; // connexion a la base
    protected  $table ; // pour remplacer  la table articles par la variables {$this->table}

    public function __construct()
    {
        $this->pdo = \Database:: getPDO(); //$this->pdo = getPDO();
    }

    /** 
     * function find(int $id): on lui envoi un identifiant et il retourne l'article ou le commentaire correspondant
     * 
     * je supprimme la specfication de type. pour eviter l'erreur suivante:
     * Catchable fatal error: Argument 1 passed to find() must be an instance of int, integer given
     * 
     * @param integer $id
     * @return void
     */

    public function find($id)
    {
        // on remplace la table articles par la variables {$this->table}
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['id' => $id]);
        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();

        return $item;
    }

    /**
     *  Supprimer un article ou un commentaire dans la base grace a son identifiant
     * 
     *  @param integer $id
     *  @return void
     */
    function delete($id)
    {
        // Attention!!! si on remplace  la table par une variable: la requete sql se met entre DOUBLE COTE
        $query = $this->pdo->prepare("DELETE FROM {$this->table}  WHERE id = :id");
        $query->execute(['id' => $id]);
    }

   /**
    * Retourne la liste des aricles classes par date 
    *
    * @return array
    */
    public function findAll()
    {       
      
        if (@in_array("created_at", $this->table )){
            $resultats = $this->pdo->query("SELECT * FROM {$this->table} ");          
        }else{
            $resultats = $this->pdo->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");         
        }
        
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;
    }


    
    public function insertArticle($title, $slug, $introduction, $content, $created_at, $nomPhoto)
    {       
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET title = :title, slug = :slug, introduction = :introduction, content = :content, created_at = NOW(), photo = :nomPhoto");
        @$query->execute(compact('title', 'slug', 'introduction', 'content', 'creted_at', 'nomPhoto' ));

        /** 
        // recuperation de l'id du nouvel article
        $lastArticle = $this->pdo->query("SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1"); 
        $row = $lastArticle ->fetchAll();
        $id = $row['id'];
        
        
        // redirection vers le nouvel article
        header('Location: index.php?controller=article&task=show&id=' .$id);  exit();
        */
    }


}