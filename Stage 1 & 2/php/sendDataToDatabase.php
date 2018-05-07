<?php
    function insertUserInfomration($firstname, $lastname, $email, $username, $password, $birthday, $gender){
        $salt = uniqid();
        $pdo = new PDO('mysql:host=localhost;dbname=wifinder-application','admin','BlackDragon123=');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dataEntry = $pdo -> prepare('INSERT INTO users (`First Name`, `Last Name`, Email, Username, Password, Salt, Birthday, Gender) '.
                                      'VALUES (:firstname,:lastname,:email,:username,SHA2(CONCAT(:password,:salt),0),:salt,:birthday,:gender)');
        $dataEntry-> bindValue(':firstname',$firstname);
        $dataEntry-> bindValue(':lastname',$lastname);
        $dataEntry-> bindValue(':email',$email);
        $dataEntry-> bindValue(':username',$username);
        $dataEntry-> bindValue(':password',$password);
        $dataEntry-> bindValue(':birthday',$birthday);
        $dataEntry->bindValue(':salt',$salt);
        $dataEntry-> bindValue(':gender',$gender);
        $dataEntry-> execute();
    }
?>