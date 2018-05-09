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

    $retreiveSearches = $pdo -> prepare("SELECT wifiHotspotname,LocationType,Address,Suburb,Latitude,Longitude, ( 3959 * acos( cos( radians(:latitude) ) * cos( radians( Latitude ) ) * cos( radians(Longitude) - radians(:longitude) ) + sin( radians(:latitude) ) * sin( radians( Latitude ) ) ) ) AS distance FROM `wifi-location` HAVING distance < 20 ORDER BY distance LIMIT 0,20");
    $retreiveSearches ->bindValue(':latitude',$latitude);
    $retreiveSearches ->bindValue(':longitude',$longitude);
    $retreiveSearches -> execute();
    $searchResults = $retreiveSearches -> fetchAll(PDO::FETCH_ASSOC);
    return $searchResults;
}

function retrieveLocationResults($location){
    $pdo = new PDO('mysql:host=localhost;dbname=wifinder-application','admin','BlackDragon123=');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $reteiveLocation = $pdo -> prepare("SELECT * ".
    "FROM(SELECT`wifi-location`.WifiHotspotName, Address, Suburb FROM `wifi-location` WHERE `wifi-location`.WifiHotspotName = :location) AS A ".
    "join ".
    "(SELECT IFNULL(WifiHotspotName,:location) As WifiHotspotName, IFNULL(round(avg(rating),1),0) AS AverageRating, IFNULL(count(rating),0) AS NumberOfRatings FROM reviews WHERE WifiHotspotName = :location) AS B ".
    "on A.WifiHotspotName  = B.WifiHotspotName");
    $reteiveLocation -> bindValue(':location',$location);
    $reteiveLocation -> execute();
    $locationResult = $reteiveLocation-> fetchAll(PDO::FETCH_ASSOC);
    return $locationResult;
}

function retrieveReviewData($location){
    $pdo = new PDO('mysql:host=localhost;dbname=wifinder-application','admin','BlackDragon123=');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $reteiveReviews = $pdo -> prepare("SELECT FirstName, LastName, DatePublished, Rating, ReviewDescription FROM reviews WHERE WifiHotspotName=:location ");
    $reteiveReviews -> bindValue(':location',$location);
    $reteiveReviews -> execute();
    $reviewResults = $reteiveReviews -> fetchAll(PDO::FETCH_ASSOC);
    return $reviewResults;
}
?>