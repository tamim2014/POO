<?php

namespace Models;
/**
 * Cette classe est le model d'access aux donnees
 * Dailleurs Lior l'a applee  Model.php
 * 
 * require_once('libraries/database.php');| desormais se fait par autoloading
 */
require_once('libraries/Database.php'); // je le met temporairement car le fichier pop-login.php me le voit pas

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
    public function delete($id)
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



    // recupere l'id du dernier article
    public function recup_last()
    {
        $reponse=$this->pdo->query ("SELECT MAX(id) AS dernier FROM {$this->table}");
        while ($donnees = $reponse ->fetch()){  $last =$donnees['dernier'];}
        return $last;
    }

    // insere un article et redirige vers son affichage
    public function insertArticle($title, $slug, $introduction, $content, $created_at, $nomPhoto)
    {       
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET title = :title, slug = :slug, introduction = :introduction, content = :content, created_at = NOW(), photo = :nomPhoto");
        //BIZARE la requete s'execute seulement sans la variable 'created_at' si on l'ajoute , le nombre de paramettre depasse et ca ne marche pas! Pourquoi??? Mystere ... ca m'a pris 2 jours pour cerner ce truc
        @$query->execute(compact('title', 'slug', 'introduction', 'content',  'nomPhoto' ));// i fo VIRER created_at car en haut il ne compte pas

        $i = $this->recup_last();
           
       header('Refresh: 1; URL=index.php?controller=article&task=show_new&id=' .$i);  exit(); // mise a jour de l'index    
       echo '<SCRIPT>javascript:window.close()</SCRIPT>'; // et on fermerait le pop mais ici le exit() annule la fermeture - je laisse aisi mpour laisser l'administrateur apprecier son nouvel article sur la pop        
    }

    public function editArticle($title, $slug,  $introduction, $content, $created_at, $nomPhoto, $id)
    {                                             
        $query = $this->pdo->prepare("UPDATE {$this->table}  SET title = :title, slug = :slug, introduction = :introduction, content = :content, created_at = NOW(), photo = :nomPhoto, id = :id WHERE id = :id") ;                                                  
        @$query->execute(compact('title','slug','introduction','content','created_at','nomPhoto','id' )); 

    }

   //Réinitialisation  de l'auto-incrément(si la table est vidée): 
   //$this->pdo->exec("ALTER TABLE articles AUTO_INCREMENT=0 "); //mysql_query("ALTER TABLE articles AUTO_INCREMENT=0 ");  
   //exit();
}