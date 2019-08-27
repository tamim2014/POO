
<!-- <img src="img/test.png" style="width:100%; height:300px; margin-top:2px; " alt="" /> -->
<img src="img/<?php echo( $article['photo']) ?>" style="width:100%; height:300px; margin-top:2px; border-radius:6px;" alt="" /> 
<h1 style="font-family: Verdana, Geneva, sans-serif;"><?= $article['title'] ?></h1>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p class=" prettyprint_blog , linenums" style="font-family: Verdana, Geneva, sans-serif; font-size: 150%;"><?= $article['introduction'] ?></p>
<hr>
<div  class=" prettyprint_blog , linenums"  >  
    <div style="margin-bottom:20px; line-height: 200%; font-size: 150%;  font-family: Verdana, Geneva, sans-serif;">     <?= $article['content'] ?> </div> <!-- contenu de l'article -->
    <div style="float:right; ">
        <?php if (count($commentaires) != 0) : ?>
           <b> <?= count($commentaires) ?> Commetaires </b>
        <?php endif ?>   
    </div><br><br><br><br>
    <div style="border: 1px solid #e1e1e8; margin-bottom:20px;"></div>
    <div >
        <?php if (count($commentaires) != 0) : ?>
            <?php foreach ($commentaires as $commentaire) : ?>              
                <div style="background-color:#f7f7f9; padding:20px; border-radius:40px; margin-bottom:20px; width:50%;">
                    <b><span style="color: blue;"> <?= $commentaire['author'] ?></span> </b>&nbsp;
                    <small>Le <?= $commentaire['created_at'] ?></small>
                    <blockquote>
                        <em><?= $commentaire['content'] ?></em>
                    </blockquote>
                    <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a><br>
                </div>               
            <?php endforeach ?>
        <?php endif ?>
    </div>   
</div>
  




<div class="talazouz" style="border-radius:6px;">
    <form action="index.php?controller=comment&task=insert" method="POST" class="yissima" > 
        <input class="wendo"  type="text" name="author" placeholder="Votre pseudo !"> 
        <textarea class="hindri"  name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>       
        <input  type="hidden" name="article_id" value="<?= $article_id ?>">
        <button class="pveha">Commenter !</button>
    </form>
</div>