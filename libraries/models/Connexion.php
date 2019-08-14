<?php

require_once('libraries/database.php');

class Connexion {

    protected $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }
}