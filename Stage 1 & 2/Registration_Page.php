<?php
$errors = array();
$submitted  = False;
require(dirname(__DIR__).'/Stage 1 & 2/php/validate.php');
if(isset($_POST['first-name']) || isset($_POST['last-name'])){
    validateName($errors, $_POST, 'first-name', 'last-name');
    $submitted = True;
}
if(isset($_POST['email'])){
    validateEmail($errors, $_POST, 'email');
}
if(isset($_POST['username'])){
    validateUsername($errors, $_POST, 'username');
}
if(isset($_POST['password'])){
    validatePassword($errors, $_POST, 'password','confirm-password');
}
if(isset($_POST['month'])){
    validateBirthday($errors, $_POST, 'month','day', 'year');
}
if(isset($_POST['gender'])){
    validateGender($errors,$_POST,'gender');
}

if($submitted && !$errors){
    require(dirname(__DIR__).'/Stage 1 & 2/php/sendDataToDatabase.php');
    $birthday = $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
    insertUserInfomration($_POST['first-name'], $_POST['last-name'], $_POST['email'],$_POST['username'], $_POST['password'], $birthday, $_POST['gender']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Registration Page</title>
        <link href="css/Registration_Page_Styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/registration_page_script.js"></script>
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
                <div id="other">
                    <h1>This is a page for other content</h1>
                    <h2>other shit blah blah blah</h2>
                </div>
                <div id="registation">
                    <?php
                     if($submitted && !$errors){
                        echo ('<h1>form submitted successfully with no errors</h1>');
                    }
                    ?>
                    <form id="create-account" action="Registration_Page.php" method="POST">
                        <fieldset>
                            <legend>
                                <Strong>Sign Up</Strong>
                            </legend>
                            <?php
                                if($submitted && !$errors){
                                    echo ('form submitted successfully with no errors');
                                }
                                require(dirname(__DIR__).'/Stage 1 & 2/php/fields.php');
                                generateName($errors);
                                generateDataField("Email:","email","email","email", "input-field","Email","hideError(this)",$errors);
                                generateDataField("Username:","text","username","username","input-field","Username","hideError(this)",$errors);
                                generatePassword($errors);
                                birthdayField($errors);
                                generateGender($errors);
                            ?>
                            <input id="sign-up-btn" type="Submit" value="Sign up" onclick="return validate()"/>
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