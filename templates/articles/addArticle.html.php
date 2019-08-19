



<!--  upload_photo  -->
<div style="margin-left:5%; margin-top:5%;" >
    <form  style="margin-left:16px;" action="index.php?controller=new_article&task=newarticle"  method="POST"    enctype="multipart/form-data" >       
        <input type="text" name="title"         placeholder="Titre"           style="width:96%; margin-bottom:5px;" />
        <input type="text" name="slug"          placeholder="Slug"             style="width:96%; margin-bottom:5px;" />
        <input type="text" name="introduction"  placeholder="Introduction"  style="width:96%; margin-bottom:5px;"/>
        <textarea name="content"  cols="30" rows="10" placeholder="Votre Article ..."  style="width:96%; margin-bottom:5px;"></textarea> 
        <input type="date" name="created_at"                             style="width:96%; margin-bottom:5px;"/>
        <input type="file" name="photo" placeholder="Photo"  style="width:96%; margin-bottom:5px;"/>    
        <button type="submit" style="width:96%;" >Enregistrer</button>       
    </form>
</div>
