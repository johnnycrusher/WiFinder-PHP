<?php
    function insertUserInfomration($firstname, $lastname, $email, $username, $password, $birthday, $gender){
        $salt = uniqid();
        include('connectDB.inc');
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

    function insertReviews(){
        $location = $_GET['location'];
        $username = $_SESSION['user'];
        $rating = $_POST['rating'];
        $reviewDescription = $_POST['reviewDescription'];

        include('connectDB.inc');
        $insertReview = $pdo -> prepare('INSERT INTO reviews (WifiHotspotName, Username,DatePublished, Rating, ReviewDescription)'.
            'VALUES (:location,:username, CURDATE(),:rating,:reviewDescription)');
        $insertReview -> bindValue(':location',$location);
        $insertReview -> bindValue(':username',$username);
        $insertReview -> bindValue(':rating',$rating);
        $insertReview -> bindValue(':reviewDescription',$reviewDescription);
        $insertReview -> execute();
    }
?>