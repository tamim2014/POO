<?php

namespace Controllers;

abstract class Constructeur 
{

    protected $model;
    protected $modelName;

    public function __construct(){
        $this->model = new  $this->modelName(); // new  \Models\Article();
    }
}