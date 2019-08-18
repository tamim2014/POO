<?php
/**
 * Une nouvelle facon de charger les classes : Factorisation des require-once()
 */

spl_autoload_register(function($className){

    // var_dump($className); //test1
    // $className = Controllers\Article              - C'est ce qu'on recoit  si on appelle cette fonction dans index.php
    // require = libraries/controllers/Article.php   - C'est ce qu'on voudrait recevoir

     $className = str_replace("\\","/",$className);
     // var_dump($className); //test2
    
     require_once("libraries/$className.php"); //OK

     // apres ca j'aurais pas besoin des require_once( qui m'amene des classes)
     // juste besoin de ceux qui m'amene des foncions -  notamment require_once('libraries/utils.php'); // appel des vues

});