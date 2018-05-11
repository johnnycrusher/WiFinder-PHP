<?php
session_start();

$errors = array();
$submitted  = False;
require('php/validate.php');
if(isset($_POST['rating'])){
    validateRating($errors,$_POST, 'rating');
    $submitted = true;
}
if(isset($_POST['reviewDescription'])){
    validateReviewDescription($errors,$_POST,'reviewDescription');
    $submitted = true;
}

if($submitted && !$errors){
    require('php/sendDataToDatabase.php');
    insertReviews();
}


require('php/retreiveDataFromDatabase.php');
if(isset($_GET['location'])){
    $reviewData = retrieveReviewData($_GET['location']);
    $locationData = retrieveLocationData($_GET['location']);
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Individual Result Page</title>
        <link href="css/Indvidual_Result_Page.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/Individual_Results_Scripts.js"></script>
    </head>
    <body onload="startMaps(<?php echo($locationData[0]['Latitude'])?>,<?php echo($locationData[0]['Longitude'])?>,'<?php echo ($locationData[0]['WifiHotspotName'])?>','<?php echo($locationData[0]['Address'].",".$locationData[0]['Suburb'])?>')">
        <div class="grid">
            <div id="header">
                <?php include('php/header.inc');?>
            </div>
            <div id="header-fill-left"></div>
            <div id="header-fill-right"></div>
            <div id="menubar">
            <?php include('php/menu.inc');?>
            </div>
            <div itemscope itemtype="http://schema.org/Place" id="content">
                <div id="map"></div>
                <?php
                    require("php/individualResultsInfo.php");
                ?>
                
                <?php
                    if(isset($_SESSION['user'])){
                        require("php/writeReviewBox.php");
                    }else{
                        require("php/notLoggedinWriteReviewBox.php");
                    }
                ?>
                <div id="review-box" class="white-boxes">
                    <h2>Reviews:</h2>
                    <?php
                    require('php/reviewTiles.php');
                    echo(generateReviews($reviewData));
                    ?>
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