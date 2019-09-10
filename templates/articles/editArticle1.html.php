<?php

//1. ACCES EN LECTURE A LA BASE

//try{$conn = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '');    $conn->exec("SET NAMES 'ISO 8859-1' ");              }
//catch(Exception $e){die('Erreur de connexion à la base de donnees: '.$e->getMessage());}
//$reponse = $conn->query('SELECT * FROM articles ');

$pdo = \Database::getPDO(); // require_once('Database.php'); est faite par autoload

$reponse = $pdo->query('SELECT * FROM articles ');

$table='<div id="lister"><table border=1 width=100% >'; 
$table.='<tr> <th>ID</th><th>DATE</th><th>TITRE</th><th>PHOTO</th><th></th><th></th><th></th> </tr>';
while($article = $reponse->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi |   
      
   //$table.='<tr><td>'.$article["id"].'</td><td>'.$article["created_at"] .'</td><td>'.$article["title"].'</td><td><img src="img/'.$article['photo'].'" width="50" height="50" alt="" /></td><td><a href="editArticle_form?controller=article&task=delete&id='.$article['id'].' "  onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)"  >Delet</a></td><td><a href="templates/articles/editArticle_form.html.php?pageId='.$article['id'].'&pageTitle='.$article['title'].'&pageSlug='.$article['slug'].'&pageIntro='.$article['introduction'].'&pageContent='.$article['content'].'&pageDate='.$article['created_at'].'&pagePhoto='.$article['photo'].' " >Edit</a></td></tr>';
   $table.='<tr><td>'.$article["id"].'</td><td>'.$article["created_at"] .'</td><td style="width:30%;">'.$article["title"].'</td><td><img src="img/'.$article['photo'].'" width="50" height="50" alt="" /></td><td><a href="index.php?controller=article&task=delete&id='.$article['id'].' "  onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)"  >Delet</a></td><td><a href="templates/articles/editArticle2.html.php?pageId='.$article['id'].'&pageTitle='.$article['title'].'&pageSlug='.$article['slug'].'&pageIntro='.$article['introduction'].'&pageContent='.$article['content'].'&pageDate='.$article['created_at'].'&pagePhoto='.$article['photo'].' ">Edit </a></td><td><a href="index.php?controller=article&task=show_admin&id='.$article['id'].'">Edit comment </a></td></tr>';  
}
$table.='</table></div>';

echo $table;




 






