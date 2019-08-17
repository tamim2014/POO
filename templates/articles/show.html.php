<h1><?= $article['title'] ?></h1>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p><?= $article['introduction'] ?></p>
<hr>
<?= $article['content'] ?>

<?php if (count($commentaires) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article ... </h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($commentaires) ?> réactions : </h2>
    <?php foreach ($commentaires as $commentaire) : ?>
        <h3>Commentaire de <span style="color: blue;"> <?= $commentaire['author'] ?></span> </h3>
        <small>Le <?= $commentaire['created_at'] ?></small>
        <blockquote>
            <em><?= $commentaire['content'] ?></em>
        </blockquote>
        <a href="delete-comment.php?id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
    <?php endforeach ?>
<?php endif ?>
<div class="talazouz" >
    <form action="save-comment.php" method="POST" class="yissima" > 
        <input class="wendo"  type="text" name="author" placeholder="Votre pseudo !"> 
        <textarea class="hindri"  name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>       
        <input  type="hidden" name="article_id" value="<?= $article_id ?>">
        <button class="pveha">Commenter !</button>
    </form>
</div>