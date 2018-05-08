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

function retriveSearchResults($latitude, $longitude){
    $pdo = new PDO('mysql:host=localhost;dbname=wifinder-application','admin','BlackDragon123=');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $retreiveSearches = $pdo -> prepare("SELECT wifiHotspotname,LocationType,Address,Suburb,Latitude,Longitude, ( 3959 * acos( cos( radians(:latitude) ) * cos( radians( Latitude ) ) * cos( radians(Longitude) - radians(:longitude) ) + sin( radians(:latitude) ) * sin( radians( Latitude ) ) ) ) AS distance FROM `wifi-location` HAVING distance < 20 ORDER BY distance LIMIT 0,10");
    $retreiveSearches ->bindValue(':latitude',$latitude);
    $retreiveSearches ->bindValue(':longitude',$longitude);
    $retreiveSearches -> execute();
    $searchResults = $retreiveSearches -> fetchAll(PDO::FETCH_ASSOC);
    return $searchResults;
}

?>