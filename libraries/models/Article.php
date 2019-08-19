<?php

namespace Models;

/**
 * Quant il s'agit d'acces aux donnees on parle de "model de donnees"
 * 
 * On va mettre les fonction de la bib database.php
 * dans la class Article
 * 
 * Des qualificateurs d'acces prefixent donc  les fonctions
 */


class Article extends Connexion
{
    protected $table = "articles"; //appelee par la fonction find() de la classe Connexion


}