<?php
    // source :  https://www.9lessons.info/2016/04/php-login-system-with-pdo-connection.html
    //include("config.php");           // Configuration de la connexion de la connexion BDD
    //require_once('libraries/models/UserClass.php');
    namespace Models;
    //require_once('libraries/autoload.php'); 
    require_once('libraries/models/Connexion.php');
    require_once('libraries/models/UserClass.php');

    
    $userClass = new UserClass();

    $errorMsgReg='';
    $errorMsgLogin='';
/* Login Form */
if (!empty($_POST['loginSubmit'])) {

    $usernameEmail=$_POST['usernameEmail'];
    $password=$_POST['password'];
    if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 ) {    
        $uid=$userClass->userLogin($usernameEmail,$password);//????????????????????????
        if($uid) {      
            $url=BASE_URL.'index.php';
            header("Location: $url"); // Page redirecting to home.php 
        }else{        
            $errorMsgLogin="Please check login details.";
        }
    }
}

/* Signup Form */
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
        $uid=$userClass->userRegistration($username,$password,$email,$name); // ??????????
        if($uid) {       
            $url=BASE_URL.'home.php';
            header("Location: $url"); // Page redirecting to home.php 
        } else {     
           $errorMsgReg="Username or Email already exists.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8"> <!-- sinon tu peux pas écrire N° ni les accent-->
 <title> Authentification officier de l'etat civil</title>
 <link rel="stylesheet" href="css/show.html.css" type="text/css" media="screen, projection">
 <link rel="stylesheet" href="css/login.html.css" type="text/css" media="screen, projection">
</head>

<body style="background-color:#f7f7f9;">
    
	 
        <div id="login" style="margin:50px;" >
            <h3>Login</h3>
            <form method="post" action="" name="login">
                <label>Username or Email</label>
                <input type="text" name="usernameEmail" autocomplete="off" />
                <label>Password</label>
                <input type="password" name="password" autocomplete="off"/>
                <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
                <input type="submit" class="button" name="loginSubmit" value="Login">
            </form>
        </div>
        <br><br>
 

</body>
</html>



















