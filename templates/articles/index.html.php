<h1>Nos articles</h1><br>

<?php foreach ($articles as $article) : ?>
<div class="resume" >
    <h2><?= $article['title'] ?></h2>
    <small>Ecrit le <?= $article['created_at'] ?></small>
    <p>
       <?= $article['introduction'] ?><br>
       <a  href="article.php?id=<?= $article['id'] ?>">Lire la suite</a> &nbsp; &nbsp;    
       <a href="delete-article.php?id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
    </p> 
</div>       
<?php endforeach ?>