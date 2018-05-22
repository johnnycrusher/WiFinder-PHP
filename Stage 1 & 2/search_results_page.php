<?php 
session_start();

require("php/retreiveDataFromDatabase.php");
if(isset($_GET['latitude']) && isset($_GET['longitude'])){
        $data = retriveSearchResults($_GET['latitude'], $_GET['longitude']);
        $locationData = array();
        for($index = 0; $index < sizeof($data); $index++){
            array_push($locationData, array('lat'=>floatval($data[$index]['Latitude']), 'lng' =>floatval($data[$index]['Longitude'])));
        }
        $locationDataJSON = json_encode($locationData);
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

<body onload='startMaps(<?php echo($locationDataJSON)?>)'>
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
      <button class="sortByButton" onclick="changeSortingOption(this)" id="rating-btn">Rating</button>
      <button class="sortByButton" onclick="changeSortingOption(this)" id="name-btn">Name</button>
      <button class="sortByButton" onclick="changeSortingOption(this)" id="distance-btn">Near Me</button>
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
        <h2 id=location-text> WiFi Locations near <?php echo($_GET["location"]) ?></h2>
            <?php
                require("php/searchTiles.php");
                echo(generateSearchTiles($data));
            ?>
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