<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/HoverTabs.css" media="all">
    <link rel="stylesheet" href="css/content.css" media="all">
    <link rel="stylesheet" href="css/menu_accordeon.css" media="all">
    <link rel="stylesheet" href="documentation/css/prettify.css" type="text/css" media="screen, projection"> <!--  background de l'article et de son titre -->
    <title>Mon superbe blog - <?= $pageTitle ?></title> <!-- variable defini dans index.php -->
    <style>
        .tablecentre {           
            position:absolute; 
            border-radius:0;
            box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47; 
            -webkit-box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47;
            -moz-box-shadow: 0 0 65px #cdbe9f inset, 0 0 20px #beae8c inset, 0 0 5px #816f47;
            z-index:2;
           
        }
    </style>  
</head>

<body >
    <!-- Hover Tabs #efefef -->
    <div id="documenter_sidebar" style="margin:0; ">
		<a href="#documenter_cover" id="documenter_logo" ></a>
		<ol id="documenter_nav" >
			<li ><a  class="current" href="index.php">Accueil</a></li>
            <li><a  href="#"> Trading Algorithmique</a></li>
			<li><a href="#">Rente immobilière</a></li>
            <li><a href="#">Muses</a></li>
            <li><a href="documentation/index.html">Documentation du projet</a></li>
            <!-- <li><a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Admin</a></li> -->          
            <li class="dropdown , last-item"    > 
                  <a href="#" > Admin</a>								
				  <div class="dropdown-content"  >                  
					<a  id="addArticle"   href="index.php?controller=new_article&task=newarticle" >Ajout d'un article</a>
					<a  id="editArticle"  href="#" >Modif d'un article</a>
				  </div>			
			</li>
		</ol>
		<div id="documenter_copyright">Programmation Orientee Objet<br></div>
	</div>
   <!-- Contenu -->
   <div id="documenter_content" class="tablecentre"  >
        <?php  if(!isset($pageContent)) { $pageContent = ob_get_clean(); } ?>
        <?= $pageContent ?> <!-- variable defini dans index.php: par appel de utils.php -->
   </div>

</body>

</html>