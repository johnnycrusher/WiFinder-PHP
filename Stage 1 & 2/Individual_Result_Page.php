<?php
$here = $_GET['location'];
require('php/retreiveDataFromDatabase.php');
if(isset($_GET['location'])){
    $reviewData = retrieveReviewData($_GET['location']);
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
    <body onload="intialiseMaps()">
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
                    session_start();
                    if(isset($_SESSION['user'])){
                        require("php/writeReviewBox.php");
                    }
                ?>

                <!-- <div id="write-review-box" class="white-boxes">
                    <h2>Write your reivew:</h2>
                    <div>
                        <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="one-star" class="fa fa-star-o"></i></span>
                        <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="two-star" class="fa fa-star-o"></i></span>
                        <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="three-star" class="fa fa-star-o"></i></span>
                        <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="four-star" class="fa fa-star-o"></i></span>
                        <span onmouseover="ratingHover(this)" onmouseout="ratingHoverOut(this)" onclick="ratingChoose()"><i id="five-star" class="fa fa-star-o"></i></span>
                    </div>
                    <textarea rows="10" cols="85"></textarea>
                    <br>
                    <div id="publish-btn-container">
                        <div id="publish-locs">
                            <button id="publish-btn">Publish Your Review</button>
                        </div>
                    </div>
                </div> -->
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