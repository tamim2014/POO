<style>     
     
      div#ajouter {  
         postion:fixed;            
         width:98.5%;
         
         padding:50px 0 50px 20px; 
         margin-top:20px; 
         background-color: gray; /* #f7f7f9; */
         border-radius:1px; 
      }
      div#ajouter input,  div#ajouter textarea {
         width:96%;
         margin:10px 5px 5px 10px; 
         border: solid 1px #666666;  padding: 10px 0px 10px 10px ;
         border: solid 1px #BDC7D8; margin-bottom: 8px ;
      }
      div#ajouter button#submit, div#ajouter input#file {
         /* width:97.5%; */
         margin:5px 5px 10px 10px; 
      
         background-color: #5fcf80 ; 
         border-color: #3ac162;
         font-weight: bold;
         padding: 12px 15px;
         /* max-width: 100px; */
         color: #ffffff;
         border-radius:6px; 

      } 
</style> 



<!--  upload_photo  --> 
<div id="ajouter"  >
    <form   action="index.php?controller=new_article&task=newarticle"  method="POST"    enctype="multipart/form-data" >       
        <input type="text" name="title"         placeholder="Titre"           style="width:96%; margin-bottom:5px;" />
        <input type="text" name="slug"          placeholder="Slug"             style="width:96%; margin-bottom:5px;" />
        <input type="text" name="introduction"  placeholder="Introduction"  style="width:96%; margin-bottom:5px;"/>
        <textarea name="content"  cols="30" rows="10" placeholder="Votre Article ..."  style="width:96%; margin-bottom:5px;"></textarea> 
        <input type="date" name="created_at"                             style="width:96%; margin-bottom:5px;"/>
        <input id="file" type="file" name="photo" placeholder="Photo"  style="width:96%; margin-bottom:5px;"/>    
        <button id="submit" type="submit" style="width:96%;" >Enregistrer</button>       
    </form>
</div>
