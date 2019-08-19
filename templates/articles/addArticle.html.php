

<!--  upload_photo/SaveEtudiant.php  -->
<form method="post" action="index.php?controller=article&task=newarticle" enctype="multipart/form-data">       
    <input type="text" name="title"         placeholder="Titre" />
    <input type="text" name="slug"          placeholder="Slug" />
    <input type="text" name="introduction"  placeholder="Introduction"/>
    <textarea name="content"  cols="30" rows="10" placeholder="Votre Article ..."></textarea> 
    <input type="date" name="created_at" />
    <input type="file" name="photo" placeholder="Photo"/>    
    <button type="submit" >Enregistrer</button>       
</form>