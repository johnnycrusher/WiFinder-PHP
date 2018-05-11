<?php
session_start();
$_SESSION = session_unset();

if(ini_get("session.use_cookies")){
    $params = session_get_cookie_params();
    setcookie(session_name(), '',time()-42000,$params["path"],$params["domain"],$params["secure"], $params["httponly"]);
}
session_destroy();
header('Refresh: 5; URL=/search_page.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/Login_page.css" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-title" content="Wi-Finder">
    <meta name="apple-mobile-web-app-capable" content="yes">
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
        <div>
            <h2> You have now sucessfully logged out. You will now be redirected back to the search page</h2>
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