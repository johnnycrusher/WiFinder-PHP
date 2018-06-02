<?php 
//if user is hits the login button it will contact the server to see if
//the username and password is correct
$loggedIn = false;
$submitted = false;
require('php/retreiveDataFromDatabase.php');
if(isset($_POST['username'])){
    $submitted = true;
    if(retreiveLoginToDatabase($_POST['username'], $_POST['password'])){
        $loggedIn = true;
        session_start();
        $_SESSION['user'] = $_POST['username'];
        header("Location:search_page.php");
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Registration Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/Login_page.css" rel="stylesheet">
        <script src="js/search_page_script.js"></script>
        <link rel="manifest" href="/manifest.json">
        <meta name="apple-mobile-web-app-title" content="Wi-Finder">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="apple-touch-icon" href="img/logofinal144x144.png">
    </head>
    <body>
        <div class="grid">
            <div id="header">
                <?php include('php/header.inc');?>
            </div>
            <div id="header-fill-left"></div>
            <div id="header-fill-right"></div>
            <div id="menubar">
                <?php include('php/menu.inc');?>
            </div>
            <div id="content">
                <div id="Login">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <fieldset id="Login-box">
                            <legend>
                                <h2 id="form-header">Login:</h2>
                            </legend>
                            <div>
                                <?php
                                //if username or password is incorrect then display this error
                                if(!$loggedIn && $submitted){
                                    echo("<p class=\"error-message\">Username or Password is Incorrect</p>");
                                }
                                ?>
                                <p><b>Username:</b></p>
                                <input type="text" id="UserName" name="username" class="input-field" placeholder="Username" required="required">
                                <p><b>Password:</b></p>
                                <input type="password" id="Password" name="password" class="input-field" placeholder="Password" required="required">
                                <br>
                                <a href="">Forgot your password:</a>
                            </div>
                            <div id="login-btn-container">
                                <button type="submit" id="login-btn">Login</button>
                            </div>
                            
                        </fieldset>
                    </form>                     
                </div>
            </div>
            <div id="footer">
                <?php include('php/footer.inc') ?>
            </div>
            <div id="footer-fill-left"></div>
            <div id="footer-fill-right"></div>
        </div>
    </body>
</html>