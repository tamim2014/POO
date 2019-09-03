
<!-- <img src="img/test.png" style="width:100%; height:300px; margin-top:2px; " alt="" /> -->
<img src="img/<?php echo( $article['photo']) ?>" style="width:100%; height:300px; margin-top:2px; border-radius:6px;" alt="" /> 
<h1 style="font-family: Verdana, Geneva, sans-serif;"><?= $article['title'] ?></h1>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p class=" prettyprint_blog , linenums , police_intro" ><?= $article['introduction'] ?></p>
<hr>
<div  class=" prettyprint_blog , linenums"  >  
    <div class="police_article" style="margin-bottom:20px;"  >   <?= $article['content'] ?> </div> <!-- contenu de l'article -->
    <span id="show-comment" style="float:left; "> <b> <i style='font-size:14px' class='far'>&#xf27a;</i> &nbsp; Commenter</b> </span>
    <div style="float:right; ">
        <?php if (count($commentaires) != 0) : ?>
           <b><?= count($commentaires) ?> Commetaires </b>
        <?php endif ?>   
    </div><br><br><br><br>
    <div class="separateur" ></div>

    <div class="write_comment" >
        <form action="index.php?controller=comment&task=insert" method="POST" class="yissima" > 
            <input class="wendo"  type="text" name="author" placeholder="Votre pseudo !" > 
            <textarea class="hindri"  name="content" id="" cols="30" rows="5" placeholder="Votre commentaire ..."></textarea>       
            <input  type="hidden" name="article_id" value="<?= $article_id ?>">
            <button class="pveha">Commenter !</button>
        </form>
    </div><br><br>

    <div >
        <?php if (count($commentaires) != 0) : ?>
            <?php foreach ($commentaires as $commentaire) : ?>              
                <div class="read_comment"  >
                    <b><span style="color: blue;"> <?= $commentaire['author'] ?></span> </b>&nbsp;
                    <small>Le <?= $commentaire['created_at'] ?></small>
                    <blockquote>
                        <em><?= $commentaire['content'] ?></em>
                    </blockquote><br>
                    <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a><br>
                </div>               
            <?php endforeach ?>
        <?php endif ?>
    </div>   
</div>
  




