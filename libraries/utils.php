<?php

//reunder('articles/show')

function render(string $path, array $variables=[])
{
    // ['var1'=>9 , 'var2' => "andjib"]
    // $var1 = 9;
    // $var2 = "andjib";
    extract($variables); // transforme les champs d'un tableau en variables
    ob_start();
    require('templates/'.$path.'html.php');
    $pageContent = ob_get_clean();

    require('templates/layout.html.php');
}
?>