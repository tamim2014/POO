<?php

$pdo = \Database::getPDO(); // require_once('Database.php'); est faite par autoload
$reponse = $pdo->query('SELECT * FROM articles ');
echo' <style>     
      div#lister {    postion:absolute;    background-color:gray;  width:100%; }
      div#modifier {  
         postion:fixed;            
         width:98.5%;
         
         padding:50px 0 50px 20px; 
         margin-top:20px; 
         background-color: gray; /* #f7f7f9; */
         border-radius:1px; 
      }
      div#modifier input,  div#modifier textarea {
         width:96%;
         margin:10px 5px 5px 10px; 
         border: solid 1px #666666;  padding: 10px 0px 10px 10px ;
         border: solid 1px #BDC7D8; margin-bottom: 8px ;
      }
      div#modifier button#submit, div#modifier input#file {
         /* width:97.5%; */
         margin:5px 5px 10px 10px; 
      
         background-color: #5fcf80 ; 
         border-color: #3ac162;
         font-weight: bold;
         padding: 12px 15px;
         /* max-width: 100px; */
         color: #ffffff;
         border-radius:6px; 

      } 
</style> ' ;

$table='<div id="lister"><table border=1 style="border-radius:6px;" >'; 
$table.='<tr> <th>ID</th><th>DATE</th><th>TITRE</th><th>PHOTO</th><th></th><th></th><th></th> </tr>';
while($article = $reponse->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi |   
   //$table.='<tr><td>'.$article["id"].'</td><td>'.$article["created_at"] .'</td><td style="width:30%;">'.$article["title"].'</td><td><img src="img/'.$article['photo'].'" width="50" height="50" alt="" /></td><td><a href="index.php?controller=article&task=delete&id='.$article['id'].' "  onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)"  >Delet</a></td><td><a href="templates/articles/editArticle2.html.php?pageId='.$article['id'].'&pageTitle='.$article['title'].'&pageSlug='.$article['slug'].'&pageIntro='.$article['introduction'].'&pageContent='.$article['content'].'&pageDate='.$article['created_at'].'&pagePhoto='.$article['photo'].' ">Edit </a></td><td><a href="index.php?controller=article&task=show_admin&id='.$article['id'].'">Edit comment </a></td></tr>';
   $table.='<tr><td>'.$article["id"].'</td><td>'.$article["created_at"] .'</td><td style="width:30%;">'.$article["title"].'</td><td><img src="img/'.$article['photo'].'" width="50" height="50" alt="" /></td><td><a href="index.php?controller=article&task=delete&id='.$article['id'].' "  onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)"  >Delet</a></td><td><a href="index.php?controller=edit_article&task=editarticle&pageId='.$article['id'].'&pageTitle='.$article['title'].'&pageSlug='.$article['slug'].'&pageIntro='.$article['introduction'].'&pageContent='.$article['content'].'&pageDate='.$article['created_at'].'&pagePhoto='.$article['photo'].' ">Edit </a></td><td><a href="index.php?controller=article&task=show_admin&id='.$article['id'].'">Edit comment </a></td></tr>';   
}

$table.='</table></div>';

echo $table;




 






