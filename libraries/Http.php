<?php

/**
 * Redirige le visiteur vers $url
 * 
 * @param string $url
 * @return void
 */
class Http 
{
    public static function redirect($url) {
    
        header("Location: $url");
        exit();
    }
}