<?php
        
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
        $id = $_GET['id'];
   
     
        $pageTitle = $_GET['pageTitle'];
        $pageIntro = $_GET['pageIntro'];
        $pageContent = $_GET['pageContent'];
        $pageDate = $_GET['pageDate'];
        $pagePhoto = $_GET['pagePhoto'];

?>

<div id="modifier" style="margin-left:5%; margin-top:5%;">                                      
        <form   action="/index.php?controller=edit_article&task=editArticle&id=<?= $id ?> "  method="POST"    enctype="multipart/form-data" style="margin-left:16px;" >       
            <input type="text" name="title"                value="<?php echo $pageTitle ; ?>"     style="width:96%; margin-bottom:5px;" />
            <input type="text" name="introduction"         value="<?php echo $pageIntro ; ?>"     style="width:96%; margin-bottom:5px;"/>
            <textarea name="content"  cols="30" rows="10"                                         style="width:96%; margin-bottom:5px;"><?php echo $pageContent ; ?></textarea> 
            <input type="date" name="created_at"           value="<?php echo $pageDate ; ?>"      style="width:96%; margin-bottom:5px;"/>
            <input type="file" name="photo"                value="<?php echo $pagePhoto ; ?>"     style="width:96%; margin-bottom:5px;"/>    
            <button type="submit" style="width:96%;" >Enregistrer</button>       
        </form>
</div> 





