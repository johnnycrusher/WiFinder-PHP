<?php
function retreiveLoginToDatabase($username, $password){
    $pdo = new PDO('mysql:host=localhost;dbname=wifinder-application','admin','BlackDragon123=');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $retreiveUsername = $pdo -> prepare("SELECT Username,Password,Salt FROM users Where Username=:username AND PASSWORD = SHA2(CONCAT(:password,Salt),0)");
    $retreiveUsername ->bindValue(':username',$username);
    $retreiveUsername ->bindValue(':password',$password);
    $retreiveUsername-> execute();
    return $retreiveUsername-> rowCount()>0;
}

?>