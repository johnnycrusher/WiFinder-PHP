<?php
  $pdo = new PDO('mysql:host=localhost;dbname=wifinder-application','admin','BlackDragon123=');
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $result = $pdo ->query('SELECT FirstName, LastName, DatePublished, Rating, ReviewDescription FROM reviews WHERE WifiHotspotName="Annerley Library Wifi"');
  $result_fetch = $result->fetchAll(PDO::FETCH_ASSOC);
  $myJSON = json_encode($result_fetch);
  echo $myJSON;
?>
