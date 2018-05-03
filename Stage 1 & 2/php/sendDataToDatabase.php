<?php

    function insertUserInfomration($firstname, $lastname, $email, $username, $password, $birthday, $gender){
        $pdo = new PDO('mysql:host=localhost;dbname=wifinder-application','admin','BlackDragon123=');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dataEntry = $pdo -> prepare('INSERT INTO users (`First Name`, `Last Name`, Email, Username, Password, Birthday, Gender) '.
                                      'VALUES (:firstname,:lastname,:email,:username,:password,:birthday,:gender)');
        $dataEntry-> bindValue(':firstname',$firstname);
        $dataEntry-> bindValue(':lastname',$lastname);
        $dataEntry-> bindValue(':email',$email);
        $dataEntry-> bindValue(':username',$username);
        $dataEntry-> bindValue(':password',$password);
        $dataEntry-> bindValue(':birthday',$birthday);
        $dataEntry-> bindValue(':gender',$gender);  
        $dataEntry-> execute();
    }
    
?>