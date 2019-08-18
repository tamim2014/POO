<?php

class Application 
{
    public static function process(){
        $controllerName = "Article";
        $task = "index";

        $controllerName = "\Controllers\\".$controllerName;

        $controller = new  $controllerName();
        $controller->$task();
    }
}