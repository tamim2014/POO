<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/HoverTabs.css" media="all">
    <link rel="stylesheet" href="css/content.css" media="all">
    <title>Mon superbe blog - <?= $pageTitle ?></title> <!-- variable defini dans index.php -->
</head>

<body>
    <!-- Hover Tabs #efefef -->
    <div id="documenter_sidebar">
		<a href="#documenter_cover" id="documenter_logo" ></a>
		<ol id="documenter_nav" >
			<li ><a  class="current" href="#documenter_cover">Accueil</a></li>
            <li><a  href="#"> Trading Algorithmique</a></li>
			<li><a href="#">Rente immobilière</a></li>
            <li><a href="#">Muses</a></li>
			<li><a href="documentation/index.html">Documentation du projet</a></li>
		</ol>
		<div id="documenter_copyright">Programmation Orientee Objet<br></div>
	</div>


   <!-- Contenu -->
   <div id="documenter_content">
        <?= $pageContent ?> <!-- variable defini dans index.php: par appel de utils.php -->
   </div>
</body>

</html>