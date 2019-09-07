<?php


namespace Controllers;

class Edit_article extends Constructeur
{   
    protected $modelName = \Models\Edit_article::class;             
    public function editArticle() {
        //$articleModel = new \Models\New_article(); 
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }
     
        $id = $_GET['id'];
   
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        } 

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
         
        if($title && $slug && $introduction && $content &&  $created_at && $nomPhoto )  { 
            $this->model->editArticle( $title, $slug, $introduction, $content, $created_at, $nomPhoto ) ;        
        }       
    }

}
