<?php 
session_start();
if(isset($_POST['location'])){
  $_SESSION['location'] = $_POST['location'];
}
if(isset($_POST['location-type'])){
  $_SESSION['location-type'] = $_POST['location-type'];
}
if(isset($_POST['WiFi-location-type'])){
  $_SESSION['WiFi-location-type'] = $_POST['WiFi-location-type'];
}
if(isset($_POST['rating'])){
  $_SESSION['rating'] = $_POST['rating'];
}
if(isset($_POST['longitude'])){
  $_SESSION['longitude'] = $_POST['longitude'];
}
if(isset($_POST['latitude'])){
  $_SESSION['latitude'] = $_POST['latitude'];
}
require("php/retreiveDataFromDatabase.php");
if(isset($_SESSION['latitude']) && isset($_SESSION['longitude'])){
   $data = retriveSearchResults($_SESSION['latitude'], $_SESSION['longitude']);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <link href="css/search_results_page_style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/search_results_page_script.js" type="text/javascript"></script>
  
</head>

<body onload="intialiseMaps()">
  <div class="grid">

    <!--header and various fills-->
    <div id="header">
      <?php include('php/header.inc');?>
    </div>

    <div id="header-fill-left"></div>
    <div id="header-fill-right"></div>

    <div id="menubar">
      <?php include('php/menu.inc');?>
    </div>

    <!--filters bar for search results-->
    <div id="filter-bar">
    <span id = "sortBy">
      <h4>Sort By:
      <button class="sortByButton">Rating</button>
      <button class="sortByButton">Name</button>
      <button class="sortByButton">Near Me</button>
      </h4>
    </span>
    <span id = "filter-location">
      <h4>
        Location:
        <select name="Locations">
          <option value = "both">Both</option>
          <option value="park">Park</option>
          <option value="library">Library</option>
        </select>
        <button id="apply-btn">Apply</button>
      </h4>
    </span>
    </div>

    <!--content area and various fills-->
    <div id="content">
      <!--Search results up to five per page-->
      <div id="results">
        <h2 id=location-text> WiFi Locations near <?php echo($_SESSION["location"]) ?></h2>
            <?php
                require("php/searchTiles.php");
                echo(generateSearchTiles($data));
            ?>
<!--        <div class="item-box">-->
<!--          <div id="map-item-one" class="map" onclick="opensite()"></div>-->
<!--          <div id="location-info-one"class="location-info">-->
<!--            <div id="wifiLocationOne">-->
<!--              <h2 class="wifiName">-->
<!--                <a href="Individual_Result_Page.php">Annerley Library Wifi</a>-->
<!--              </h2>-->
<!--              <p class="rating">-->
<!--                <i class="fa fa-star"></i>-->
<!--                <i class="fa fa-star"></i>-->
<!--                <i class="fa fa-star"></i>-->
<!--                <i class="fa fa-star"></i>-->
<!--                <i class="fa fa-star-o"></i>-->
<!--                4/5 stars-->
<!--              </p>-->
<!--              <p class="address">Address: 450 Ipswich Road, Annerley, QLD, 4103</p>-->
<!--              <p class="location">Location: Library</p>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!---->
<!--        <div class="item-box">-->
<!--            <div id="map-item-two" class="map" onclick="opensite()"></div>-->
<!--            <div id="location-info-two"class="location-info">-->
<!--              <div id="wifiLocationTwo">-->
<!--                <h2 class = "wifiName">-->
<!--                  <a href="Individual_Result_Page.php">Fairfield Library Wifi</a>-->
<!--                </h2>-->
<!--                <p class="rating">-->
<!--                  <i class="fa fa-star"></i>-->
<!--                  <i class="fa fa-star"></i>-->
<!--                  <i class="fa fa-star"></i>-->
<!--                  <i class="fa fa-star-o"></i>-->
<!--                  <i class="fa fa-star-o"></i>-->
<!--                  3/5 stars            -->
<!--                </p>-->
<!--                <p class="address">Address: Fairfield Gardens Shopping center, 180 Fairfield Road, Fairfield, 4103</p>-->
<!--                <p class="location">Location: Library</p>-->
<!--              </div>-->
<!--            </div> -->
<!--        </div>-->
<!---->
<!--        <div class="item-box">-->
<!--          <div id="map-item-three" class="map" onclick="opensite()"></div>-->
<!--          <div id="location-info-three"class="location-info">-->
<!--            <div id="wifiLocationThree">-->
<!--              <h2 class = "wifiName">-->
<!--                <a href="Individual_Result_Page.php">Stones Corner Library Wifi</a>-->
<!--              </h2>-->
<!--              <p class="rating">-->
<!--                <i class="fa fa-star"></i>-->
<!--                <i class="fa fa-star"></i>-->
<!--                <i class="fa fa-star"></i>-->
<!--                <i class="fa fa-star"></i>-->
<!--                <i class="fa fa-star-o"></i>-->
<!--                4/5 stars            -->
<!--              </p>-->
<!--              <p class="address">Address: 280 Logan Road, Stones Corner, QLD, 4120</p>-->
<!--              <p class="location">Location: Park</p>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!---->
<!--        <div class="item-box">-->
<!--          <div id="map-item-four" class="map" onclick="opensite()"></div>-->
<!--          <div id="location-info-two"class="location-info">-->
<!--              <div id="wifiLocationFour">-->
<!--                <h2 class="wifiName">-->
<!--                    <a href="Individual_Result_Page.php">Glindemann Park</a>-->
<!--                  </h2>-->
<!--                  <p class="rating">-->
<!--                    <i class="fa fa-star"></i>-->
<!--                    <i class="fa fa-star"></i>-->
<!--                    <i class="fa fa-star-o"></i>-->
<!--                    <i class="fa fa-star-o"></i>-->
<!--                    <i class="fa fa-star-o"></i>-->
<!--                    2/5 stars            -->
<!--                  </p>-->
<!--                  <p class="address">Address: Logan Road, Holland Park West, QLD, 4121</p>-->
<!--                  <p class="location">Location: Park</p>-->
<!--              </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="item-box">-->
<!--          <div id="map-item-five" class="map" onclick="opensite()"></div>-->
<!--          <div class="location-item">-->
<!--            <div id="location-info-five"class="location-info">-->
<!--              <div id="wifiLocationFive">-->
<!--                <h2 class="wifiName">-->
<!--                  <a href="Individual_Result_Page.php">Garden City Library Wifi</a>-->
<!--                </h2>-->
<!--                <p class="rating">-->
<!--                  <i class="fa fa-star"></i>-->
<!--                  <i class="fa fa-star"></i>-->
<!--                  <i class="fa fa-star"></i>-->
<!--                  <i class="fa fa-star-o"></i>-->
<!--                  <i class="fa fa-star-o"></i>-->
<!--                  3/5 stars            -->
<!--                </p>-->
<!--                <p class="address">Address: Garden City Shopping Centre, Corner Logan and Kessels Road,Upper Mount Gravatt,QLD, 4122</p>-->
<!--                <p class="location">Location: Library</p>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
         </div>
    </div>
  <!-- footer -->
  <div id="footer">
    <?php include('php/footer.inc') ?>
  </div>

  </div>
  <!--end of body-->

</body>

</html>