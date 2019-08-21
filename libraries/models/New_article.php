<?php

namespace Models;

//require_once('libraries/models/Connexion.php');

require_once('templates/articles/addArticle.html.php');
//require_once('templates/layout.html.php'); // c'est ce qui affiche le menu de gauche

class New_article extends Connexion  
{
    protected $table = "articles"; 
}
