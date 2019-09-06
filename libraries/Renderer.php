<?php

/**
 * On transfert ici les fonction de rendu qui ete dans le fichier utils.php
 * 
 * Affichage d1 template en injectant  les variables HTML
 * 
 * @param array $variable
 * @return void
 */

 class Renderer
 {
    //vue d'un article : render('articles/show')
    public function render_show( array $variables=[] )
    {
        extract($variables); // transforme les champs d'un tableau en variables
        ob_start(); // mise en tampon des donnees (avant de les envoyer au navigateur)
        require('templates/articles/show.html.php'); // vue d'1 article
        $pageContent = ob_get_clean(); //  Lit le contenu  du tampon de sortie puis l'efface
        require('templates/layout.html.php');
    }

    //vue de la page d'accueil : render('articles/index')
    public function render_index( array $variables=[] )
    {
        extract($variables); 
        ob_start(); 
        require('templates/articles/index.html.php'); // vue de l page d'accueil
        $pageContent = ob_get_clean(); 

        require('templates/layout.html.php');
    }

    //vue de la page de saisie d1 article
    public function render_saisie( array $variables=[] )
    {
        extract($variables); 
        ob_start(); 
        require('templates/articles/addArticle.html.php'); 
        $pageContent = ob_get_clean(); 

        require('templates/layout.html.php');
    }

    //vue authentification/inscription
    public function render_login(array $variables=[] )
    {
        extract($variables);  // pour transmettre la variable errorMsgLogin au template login.html.php
        ob_start(); 
        //require('templates/articles/addArticle.html.php'); 
        $pageContent = ob_get_clean(); 

        require('templates/login.html.php');
    }

    //vue de la page de modification d1 article
    public function render_edit( array $variables=[] )
    {
        extract($variables); 
        ob_start(); 
        require('templates/articles/editArticle2.html.php'); 
        $pageContent = ob_get_clean(); 

        require('templates/layout.html.php');
    }

 }
