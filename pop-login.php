<?php
    // source :  https://www.9lessons.info/2016/04/php-login-system-with-pdo-connection.html
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
            $url='index.php?controller=new_article&task=newarticle';        
            header("Location: $url"); 
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
            $url='index.php?controller=new_article&task=newarticle';
            header("Location: $url"); // Page redirecting to new article 
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#signup").hide()
            $("#affiche-inscription").click(function(){
                $("#signup").show();
                $("#login").hide();
            });
            $("#affiche-login").click(function(){
                $("#signup").hide();
                $("#login").show();
            });
        });
    </script>
</head>

<body style="background-color:#f7f7f9;" >
    
	 
        <div id="login"  >
            <h3>Login</h3>
            <form method="post" action="" name="login">
                <label>Username or Email</label>
                <input type="text" name="usernameEmail" autocomplete="off" />
                <label>Password</label>
                <input type="password" name="password" autocomplete="off"/>
                <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
                <input type="submit" class="button" name="loginSubmit" value="Login">
                <input type="button" id="affiche-inscription" class="button" name="inscription" value="Signup"  >
            </form>
        </div>
        

        <div id="signup"  >
            <h3>Registration</h3>
            <form method="post" action="" name="signup">
                <label>Name</label>
                <input type="text" name="nameReg" autocomplete="off" />
                <label>Email</label>
                <input type="text" name="emailReg" autocomplete="off" />
                <label>Username</label>
                <input type="text" name="usernameReg" autocomplete="off" />
                <label>Password</label>
                <input type="password" name="passwordReg" autocomplete="off"/>
                <div class="errorMsg"><?php echo $errorMsgReg; ?></div>
                <input type="submit" class="button" name="signupSubmit" value="Signup">
                <input type="button" id="affiche-login" class="button" name="inscription" value="Login"  >
            </form>
        </div>
 

</body>
</html>



















