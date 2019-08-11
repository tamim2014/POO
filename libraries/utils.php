<?php
/*
* PROBLEME: On repete les mm bout de code un peu partout
* SOLUTION: REFACTORISATION DU CODE(c'est le role des FONCTIONS) 
*
* render(array tableau)    .......... pour afficher une page
* redirect(string chemin)  .......... pour faire une redirection
*
*/
//vue d'un article
//render('articles/show')

function render_show( array $variables=[] )
{
    // ['var1'=>9 , 'var2' => "andjib"]
    // $var1 = 9;
    // $var2 = "andjib";
    extract($variables); // transforme les champs d'un tableau en variables
    ob_start(); // mise en tampon des donnees (avant de les envoyer au navigateur)
    require('templates/articles/show.html.php'); // vue d'1 article
    $pageContent = ob_get_clean(); //  Lit le contenu  du tampon de sortie puis l'efface
    require('templates/layout.html.php');
}

//vue de la page d'accueil
//render('articles/index')

function render_index( array $variables=[] )
{

    extract($variables); // transforme les champs d'un tableau en variables
    ob_start(); // mise en tampon des donnees (avant de les envoyer au navigateur)
    require('templates/articles/index.html.php'); // vue de l page d'accueil
    $pageContent = ob_get_clean(); //  Lit le contenu  du tampon de sortie puis l'efface

    require('templates/layout.html.php');
}

function redirect(string $url)
{
    header("Location: $url");
    exit();
}
?>