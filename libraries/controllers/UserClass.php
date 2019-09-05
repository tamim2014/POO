<?php

// source :  https://www.9lessons.info/2016/04/php-login-system-with-pdo-connection.html
namespace Controllers;
//require_once('libraries/autoload.php'); 
require_once('libraries/models/Connexion.php');
require_once('libraries/models/UserClass.php');

class UserClass extends Constructeur
{
    protected $modelName = \Models\UserClass::class;  //$userClass = new UserClass();
    protected $errorMsgReg='';
    protected $errorMsgLogin='';
    /* Login Form */
    public function authentification() {
        if (!empty($_POST['loginSubmit'])) {
            $usernameEmail=$_POST['usernameEmail'];
            $password=$_POST['password'];
            if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ) {    
                $uid=$this->model->userLogin($usernameEmail,$password); // ca se passe ici
                if($uid) {                  
                    $url='index.php?controller=new_article&task=newarticle';        
                    header("Location: $url"); 
                }else{        
                    $errorMsgLogin="Please check login details.";
                }
            }
        }
        @\Renderer::render_login(compact( 'errorMsgLogin' )); 
    }
    public function authentification_edit() {
        if (!empty($_POST['loginSubmit'])) {
            $usernameEmail=$_POST['usernameEmail'];
            $password=$_POST['password'];
            if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ) {    
                $uid=$this->model->userLogin($usernameEmail,$password); // ca se passe ici
                if($uid) {                  
                    $url='index.php?controller=edit_article&task=editarticle';        
                    header("Location: $url"); 
                }else{        
                    $errorMsgLogin="Please check login details.";
                }
            }
        }
        @\Renderer::render_login(compact( 'errorMsgLogin' )); 
    }

    /* Signup Form */
    public function inscription(){
        if (!empty($_POST['signupSubmit'])) { 
            $username=$_POST['usernameReg'];
            $email=$_POST['emailReg'];
            $password=$_POST['passwordReg'];
            $name=$_POST['nameReg'];
            /* Regular expression check */
            $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
            $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
            $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

            if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
            {
                $uid=$this->model->userRegistration($username,$password,$email,$name); // ce se passe ici
                if($uid) {       
                    $url='index.php?controller=new_article&task=newarticle';
                    header("Location: $url"); // Page redirecting to new article 
                } else {     
                $errorMsgReg="Username or Email already exists.";
                }
            }
        }
        @\Renderer::render_login(); 
    }
}






















