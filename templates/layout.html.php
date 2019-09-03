<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script> <!-- icon -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".write_comment").hide()
            $("#show-comment").click(function(){
                $(".write_comment").show();
            });
        });
        function pop_authentification()
        {             
		    window.open("templates/login.html.php", 'Popup', 'scrollbars=1, Menubar=1, resizable=1, height=510, width= 700 ,  top=125, left=200 '); return false;          
		}
    </script>
    <link rel="stylesheet" href="css/HoverTabs.css" media="all">
    <link rel="stylesheet" href="css/content.css" media="all">
    <link rel="stylesheet" href="css/menu_accordeon.css" media="all">
    <link rel="stylesheet" href="css/show.html.css" type="text/css" media="screen, projection"> <!--  background de l'article et de son titre -->
    <link rel="stylesheet" href="documentation/css/prettify.css" type="text/css" media="screen, projection">
 
    <title>Mon blog - <?= $pageTitle ?></title> <!-- variable defini dans index.php -->
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
                  <a href="#"   > Admin</a>								
				  <div class="dropdown-content"  >                                       
					<a  id="addArticle"   href="#" onclick="pop_authentification();" >Ajout d'un article</a>
					<a  id="editArticle"  href="#" >Modif d'un article</a>
				  </div>			
			</li>
		</ol>
		<div id="documenter_copyright">Programmation Orientee Objet<br></div>
	</div>
   <!-- Contenu -->
   <div id="documenter_content" class="tablecentre"   >
        <?php  if(!isset($pageContent)) { $pageContent = ob_get_clean(); } ?>
        <div style=" margin-left:5%; width:90%;">
           <?= $pageContent ?> <!-- variable defini dans index.php: par appel de utils.php -->
        </div>
   </div>

</body>

</html>