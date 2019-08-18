<?php

/**
 * On transfert ici les fonction de rendu qui ete dans le fichier utils.php
 * 
 * Affichage d1 template en injectant HTML les variables
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

 }
