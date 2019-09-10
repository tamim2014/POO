<?php

namespace Controllers;

require_once('templates/articles/editArticle1.html.php');

class Edit_article extends Constructeur
{   
    protected $modelName = \Models\Edit_article::class; 
    
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
                        <form   action="#"  method="POST"    enctype="multipart/form-data" style="margin-left:16px;" >       
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
              
            $pageTitle = null;
            if (!empty($_POST['title']) ) {    $pageTitle = $_POST['title']; }     
            $pageSlug  = null;
            if (!empty($_POST['slug'])) { $pageSlug = $_POST['slug']; }
            $pageIntro = null;
            if (!empty($_POST['introduction'])) {  $pageIntro = $_POST['introduction']; }
            $pageContent = null;
            if (!empty($_POST['content'])) {  $pageContent = htmlspecialchars($_POST['content']); }
            $pageDate = null;
            if (!empty($_POST['created_at'])) {   $pageDate = $_POST['created_at']; }                 
            $pagePhoto = null;
            $fichierTempo = null;
            if (!empty($_POST['photo']) || !empty($_FILES['photo'])  ) {
                //1.On specifie le nom du fichier
                $pagePhoto = $_FILES['photo']['name'];//$_FILES['name de l'input']['name du fichier à importer'] 
                //2.On spécifie le chemin du fichier           
                $fichierTempo = $_FILES['photo']['tmp_name'];// $_FILES['name de l'input']['path du ficher ']        
                //3.On importe le fichier   
                move_uploaded_file($fichierTempo, "C:\wamp64\www\POO\img\\".$pagePhoto);  
            }  
            if($pageTitle) {      
               $this->model->editArticle($pageTitle, $pageSlug,  $pageIntro, $pageContent, $pageDate, $pagePhoto, $id ) ;
            }                
           // \Http::redirect('index.php'); // cette redirection ne roule pas  (tester pour voir la bizare raison pourquoi !)                
    }
}
