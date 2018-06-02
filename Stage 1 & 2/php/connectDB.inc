<?php
    //connects to the database
    $pdo = new PDO('mysql:cab230.sef.qut.edu.au;=cab202;dbname=n9154566','n9154566','BigSecret!');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>