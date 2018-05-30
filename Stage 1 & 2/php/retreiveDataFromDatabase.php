<?php
function retreiveLoginToDatabase($username, $password){
    include('connectDB.inc');

    $retreiveUsername = $pdo -> prepare("SELECT Username,Password,Salt FROM users Where Username=:username AND PASSWORD = SHA2(CONCAT(:password,Salt),0)");
    $retreiveUsername ->bindValue(':username',$username);
    $retreiveUsername ->bindValue(':password',$password);
    $retreiveUsername-> execute();
    return $retreiveUsername-> rowCount()>0;
}
function retreiveSearchResulsByName(){
    include('connectDB.inc');
    $location = $_GET['location'];
    if(strcmp($_GET['sort'],"rating")==0){
        $search = 'AvgRating DESC';
    }else if(strcmp($_GET['sort'],"alphabetical")==0){
        $search = 'WifiHotspotName ASC';
    }else{
        $search = 'WifiHotspotName ASC';
    }

    if(strcmp($_GET['WiFi-location-type'],"park")==0){
        $Where = "LocationType = 'Park'";
    }else if(strcmp($_GET['WiFi-location-type'],"library") == 0){
        $Where = "LocationType = 'Library'";
    }else{
        $Where = "LocationType = 'Park' OR LocationType = 'Library'";
    }

    $retrieveSearch = $pdo -> prepare("SELECT w.WifiHotspotName,w.LocationType,w.Address,w.Suburb,w.Latitude,w.Longitude,".
    "ifnull(round(avg(r.rating),1),0) AS AvgRating FROM `wifi-location` w ".
    "LEFT JOIN reviews r ".
    "ON w.WifiHotspotName = r.WifiHotspotName ".
    "WHERE (".$Where .") AND w.WifiHotspotName LIKE :location ".
    "GROUP BY WifiHotspotName ".
    "HAVING avgRating >= :rating ".
    "LIMIT 0,20");
    $retrieveSearch -> bindValue(':location',"%$location%", PDO::PARAM_STR);
    $retrieveSearch -> bindValue(':rating',$_GET['rating']);
    $retrieveSearch -> execute();
    $searchData = $retrieveSearch -> fetchAll(PDO::FETCH_ASSOC);
    return $searchData;
}
function retriveSearchResults($latitude, $longitude){
    include('connectDB.inc');

    if(strcmp($_GET['sort'],"rating")==0){
        $search = 'AvgRating DESC';
    }else if(strcmp($_GET['sort'],"alphabetical")==0){
        $search = 'WifiHotspotName ASC';
    }else{
        $search = 'distance';
    }

    if(strcmp($_GET['WiFi-location-type'],"park")==0){
        $Where = "LocationType = 'Park'";
    }else if(strcmp($_GET['WiFi-location-type'],"library") == 0){
        $Where = "LocationType = 'Library'";
    }else{
        $Where = "LocationType = 'Park' OR LocationType = 'Library'";
    }

    $retreiveSearches = $pdo -> prepare("SELECT w.WifiHotspotName,w.LocationType,w.Address,w.Suburb,w.Latitude,w.Longitude,".
    "(3959 * acos(cos(radians(:latitude))*cos(radians(Latitude))*cos(radians(Longitude)-radians(:longitude))+sin(radians(:latitude))*sin(radians(Latitude)))) ".
     "AS distance, ifnull(round(avg(r.rating),1),0) AS AvgRating FROM `wifi-location` w ".
    "LEFT JOIN reviews r ".
    "ON w.WifiHotspotName = r.WifiHotspotName ".
    "WHERE ".$Where ." ".
    "GROUP BY WifiHotspotName ".
    "HAVING distance<20 AND avgRating >= :rating ".
    "ORDER BY ". $search ." LIMIT 0,20");
    $retreiveSearches->bindValue(':latitude',$latitude);
    $retreiveSearches->bindValue(':longitude',$longitude);
    $retreiveSearches->bindValue(':rating',$_GET['rating']);
    $retreiveSearches -> execute();
    $searchResults = $retreiveSearches -> fetchAll(PDO::FETCH_ASSOC);
    return $searchResults;
}
function retireveSearchRatings(){
    include('connectDB.inc');
    $location = $_GET['location'];
    if(strcmp($_GET['sort'],"rating")==0){
        $search = 'AvgRating DESC';
    }else if(strcmp($_GET['sort'],"alphabetical")==0){
        $search = 'WifiHotspotName ASC';
    }else{
        $search = 'AvgRating DESC';
    }

    if(strcmp($_GET['WiFi-location-type'],"park")==0){
        $Where = "LocationType = 'Park'";
    }else if(strcmp($_GET['WiFi-location-type'],"library") == 0){
        $Where = "LocationType = 'Library'";
    }else{
        $Where = "LocationType = 'Park' OR LocationType = 'Library'";
    }

    $retrieveSearchRating = $pdo -> prepare("SELECT w.WifiHotspotName,w.LocationType,w.Address,w.Suburb,w.Latitude,w.Longitude,".
    "ifnull(round(avg(r.rating),1),0) AS AvgRating FROM `wifi-location` w ".
    "LEFT JOIN reviews r ".
    "ON w.WifiHotspotName = r.WifiHotspotName ".
    "WHERE (".$Where .")".
    "GROUP BY WifiHotspotName ".
    "HAVING avgRating >= :rating ".
    "ORDER BY ". $search ." LIMIT 0,20");
    $retrieveSearchRating -> bindValue(':rating',$_GET['rating']);
    $retrieveSearchRating -> execute();
    $searchRatingData = $retrieveSearchRating -> fetchAll(PDO::FETCH_ASSOC);
    return $searchRatingData;
}

function retrieveLocationResults($location){
    include('connectDB.inc');

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
    include('connectDB.inc');

    $reteiveReviews = $pdo -> prepare("SELECT Username, DatePublished, Rating, ReviewDescription FROM reviews WHERE WifiHotspotName=:location ");
    $reteiveReviews -> bindValue(':location',$location);
    $reteiveReviews -> execute();
    $reviewResults = $reteiveReviews -> fetchAll(PDO::FETCH_ASSOC);
    return $reviewResults;
}

function retrieveLocationData($location){
    include('connectDB.inc');

    $retrieveLocationData = $pdo -> prepare("SELECT WifiHotspotName, Address, Suburb, Latitude, Longitude FROM `wifi-location` WHERE WifiHotspotName = :location");
    $retrieveLocationData -> bindValue(':location',$location);
    $retrieveLocationData -> execute();
    $locationData = $retrieveLocationData -> fetchAll(PDO::FETCH_ASSOC);
    return $locationData;
}

function checkExistingUsername($username){
    include('connectDB.inc');

    $findUsername = $pdo -> prepare("SELECT Username FROM users WHERE Username=:username");
    $findUsername -> bindValue(':username',$username);
    $findUsername -> execute();
    $userExist = $findUsername -> rowCount()>0;
    return $userExist;
}
function checkExistingEmail($email){
    include('connectDB.inc');

    $findEmail = $pdo -> prepare("SELECT Email FROM users WHERE Email=:email");
    $findEmail -> bindValue(':email',$email);
    $findEmail -> execute();
    $emailExist = $findEmail -> rowCount()>0;
    return $emailExist;
}
?>