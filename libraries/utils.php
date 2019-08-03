<?php

//render('articles/show')

function render_show( array $variables=[] )
{
    // ['var1'=>9 , 'var2' => "andjib"]
    // $var1 = 9;
    // $var2 = "andjib";
    extract($variables); // transforme les champs d'un tableau en variables
    ob_start(); // mise en tampon des donnees (avant de les envoyer au navigateur)
    require('templates/articles/show.html.php');
    $pageContent = ob_get_clean(); //  Lit le contenu  du tampon de sortie puis l'efface

    require('templates/layout.html.php');
}

//render('articles/index')

function render_index( array $variables=[] )
{

    extract($variables); // transforme les champs d'un tableau en variables
    ob_start(); // mise en tampon des donnees (avant de les envoyer au navigateur)
    require('templates/articles/index.html.php');
    $pageContent = ob_get_clean(); //  Lit le contenu  du tampon de sortie puis l'efface

    require('templates/layout.html.php');
}
?>