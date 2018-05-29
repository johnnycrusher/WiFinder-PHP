<?php 
session_start();
require("php/retreiveDataFromDatabase.php");
if(isset($_GET['search'])){
  if($_GET['search'] === "name"){
    $data = retreiveSearchResulsByName($_GET['location']);
    $locationData = array();
    for($index = 0; $index < sizeof($data); $index++){
      array_push($locationData, array('lat'=>floatval($data[$index]['Latitude']), 'lng' =>floatval($data[$index]['Longitude'])));
    }
    $locationDataJSON = json_encode($locationData);
  }else{
    if(isset($_GET['latitude']) && isset($_GET['longitude'])){
      $data = retriveSearchResults($_GET['latitude'], $_GET['longitude']);
      $locationData = array();
      for($index = 0; $index < sizeof($data); $index++){
        array_push($locationData, array('lat'=>floatval($data[$index]['Latitude']), 'lng' =>floatval($data[$index]['Longitude'])));
      }
     $locationDataJSON = json_encode($locationData);
    }
  }
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
  <link rel="manifest" href="/manifest.json">
  <meta name="apple-mobile-web-app-title" content="Wi-Finder">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="apple-touch-icon" href="img/logofinal144x144.png">
  
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
    <div id = "sortBy">
      <h4>Sort By:
      <button class="sortByButton" onclick="changeSortingOption(this)" id="rating-btn">Rating</button>
      <button class="sortByButton" onclick="changeSortingOption(this)" id="name-btn">Name</button>
      <button class="sortByButton" onclick="changeSortingOption(this)" id="distance-btn">Near Me</button>
      </h4>
    </div>
    <div id = "filter-location">
      <h4>
        Location:
        <select name="location-type" id="location-type">
          <option value ="both">Both</option>
          <option value="park">Park</option>
          <option value="library">Library</option>
        </select>
        <button id="apply-btn" onclick="changeLocationType()">Apply</button>
      </h4>
    </div>
    </div>
    <!--content area and various fills-->
    <div id="content">
      <!--Search results up to five per page-->
      <div id="results">
        <h2 id=location-text> WiFi Locations near <?php echo($_GET["location"]) ?></h2>
            <?php
                require("php/searchTiles.php");
                if(sizeof($data) > 0 && $_GET['search'] ==="address"){
                  echo(generateSearchTiles($data,true));
                }else if(sizeof($data) > 0 && $_GET['search'] ==="name"){
                  echo(generateSearchTiles($data,false));
                }
                  else{
                  echo("<h2 class=\"center-horizontally\">No search result found redirecting to Advance Search Page</h2>");
                  header('Refresh: 5; URL=search_page.php');
                } 
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