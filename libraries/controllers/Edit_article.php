<?php

namespace Controllers;

require_once('templates/articles/editArticle1.html.php');

class Edit_article extends Constructeur
{   
    protected $modelName = \Models\Edit_article::class; 
    
    //Cette fonction court-circute le template editArticle2.html.php  pour afficher le formulaire de mise a jour
    public function show_form_edit() { 
          
        if (empty($_GET['pageId']) || !ctype_digit($_GET['pageId'])) { die("Ho ?! Tu n'as pas précisé l'id de l'article !");  }     
        $id = $_GET['pageId'];
        $pageTitle = $_GET['pageTitle'];
        $pageSlug = $_GET['pageSlug'];
        $pageIntro = $_GET['pageIntro'];
        $pageContent = $_GET['pageContent'];
        $pageDate = $_GET['pageDate'];
        $pagePhoto = $_GET['pagePhoto'];

        echo '
            <div id="modifier" style="margin-left:5%; margin-top:5%;">                                     
                    <form   action="/index.php?controller=edit_article&task=editarticle&id='.$id.'"  method="POST"    enctype="multipart/form-data" style="margin-left:16px;" >       
                        <input type="text" name="title"                value="'.$pageTitle.'"   style="width:96%; margin-bottom:5px;"/>
                        <input type="text" name="slug"                 value="'.$pageSlug.'"    style="width:96%; margin-bottom:5px;"/>
                        <input type="text" name="introduction"         value="'.$pageIntro.'"   style="width:96%; margin-bottom:5px;"/>
                        <textarea name="content"  cols="30" rows="10"                           style="width:96%; margin-bottom:5px;">'.$pageContent.'</textarea> 
                        <input type="date" name="created_at"           value="'.$pageDate.'"    style="width:96%; margin-bottom:5px;"/>
                        <input type="file" name="photo"                value="'.$pagePhoto.'"   style="width:96%; margin-bottom:5px;"/>    
                        <button type="submit" style="width:96%;" >Enregistrer</button>       
                    </form>
            </div> 
        ';
        return $id;

    }

    public function editarticle() {
        
        //1. je dois mettre cette affichage dans la fonction  show_form_edit()
        if (empty($_GET['pageId']) || !ctype_digit($_GET['pageId'])) { die("Ho ?! Tu n'as pas précisé l'id de l'article !");  }     
        $id = $_GET['pageId'];
        $pageTitle = $_GET['pageTitle'];
        $pageSlug = $_GET['pageSlug'];
        $pageIntro = $_GET['pageIntro'];
        $pageContent = $_GET['pageContent'];
        $pageDate = $_GET['pageDate'];
        $pagePhoto = $_GET['pagePhoto'];

        echo '
            <div id="modifier" style="margin-left:5%; margin-top:5%;">                                     
                    <form   action="/index.php?controller=edit_article&task=editarticle&id='.$id.'"  method="POST"    enctype="multipart/form-data" style="margin-left:16px;" >       
                        <input type="text" name="title"                value="'.$pageTitle.'"   style="width:96%; margin-bottom:5px;"/>
                        <input type="text" name="slug"                 value="'.$pageSlug.'"    style="width:96%; margin-bottom:5px;"/>
                        <input type="text" name="introduction"         value="'.$pageIntro.'"   style="width:96%; margin-bottom:5px;"/>
                        <textarea name="content"  cols="30" rows="10"                           style="width:96%; margin-bottom:5px;">'.$pageContent.'</textarea> 
                        <input type="date" name="created_at"           value="'.$pageDate.'"    style="width:96%; margin-bottom:5px;"/>
                        <input type="file" name="photo"                value="'.$pagePhoto.'"   style="width:96%; margin-bottom:5px;"/>    
                        <button type="submit" style="width:96%;" >Enregistrer</button>       
                    </form>
            </div> 
        ';
        //return $id;
        // 2. Et ici appeler la fonction ainsi:  $this->show_form_edit();
        echo $id."77777777777777777777777777777777777777";

       if($id){
            $title = null; 
            if (!empty($_POST['title'])  ) {  $title = $_POST['title']; }
            $slug = null;
            if (!empty($_POST['slug'])) { $slug = $_POST['slug']; }
            $introduction = null;
            if (!empty($_POST['introduction'])) { $introduction = $_POST['introduction']; }
            $content = null;
            if (!empty($_POST['content'])) {  $content = htmlspecialchars($_POST['content']); }
            $created_at = null;
            if (!empty($_POST['created_at'])) {  $created_at = $_POST['created_at']; }                 
            $nomPhoto = null;
            $fichierTempo = null;
            if (!empty($_POST['photo']) || !empty($_FILES['photo'])  ) {
                //1.On specifie le nom du fichier
                $nomPhoto = $_FILES['photo']['name'];//$_FILES['name de l'input']['name du fichier à importer'] 
                //2.On spécifie le chemin du fichier           
                $fichierTempo = $_FILES['photo']['tmp_name'];// $_FILES['name de l'input']['path du ficher ']        
                //3.On importe le fichier   
                move_uploaded_file($fichierTempo, "C:\wamp64\www\POO\img\\".$nomPhoto);  
            }
        }
        if($title )  {   
            $this->model->editArticle( $title, $slug, $introduction, $content, $created_at, $nomPhoto, $id ) ;        
        }  
       // \Http::redirect('index.php'); // cette redirection ne roule pas  (tester pour voir la bizare raison pourquoi !)            
    }

}
