<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link href="css/search_page_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/search_page_script.js"></script>
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-title" content="Wi-Finder">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="img/logofinal144x144.png">
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

        <div id="content">
            <div id="search-boxes">
                <form action="search_results_page.php" id="form" method="GET">
                    <fieldset id="advance-search-box">
                        <legend>
                            <h2 id="form-header">Advance Search:</h2>
                        </legend>
                        <div id="search-box-input">
                            <h2>Search for WiFi:</h2>
                            <input id="search-box" name="location" type="text" placeholder="Search">
                            <button id="location-btn" type="button" onclick="getLocation()">
                                <i class="fa fa-map-marker fa-3x"></i>
                            </button>
                            <h2>Search By :
                            <select name="search" id="searchType">
                                <option value="address">Address</option>
                                <option value="name">Location Name</option>
                            </select>
                            </h2>
                        </div>              
                        <div id="advanced-options">
                            <h4>Narrow your search results by...</h4>
                            <input type="hidden" id="longitude" name="longitude" value ="0">
                            <input type="hidden" id="latitude" name="latitude" value="0">
                            <p>Near:
                                <select name="WiFi-location-type">
                                    <option value="both">Both</option>
                                    <option value="park">Park</option>
                                    <option value="library">Library</option>
                                </select>
                            </p>
                            <p>With a minimum rating of
                                <div>
                                    <span onclick="ratingChoose(this)"><i id="one-star" class="fa fa-star-o"></i></span>
                                    <span onclick="ratingChoose(this)"><i id="two-star" class="fa fa-star-o"></i></span>
                                    <span onclick="ratingChoose(this)"><i id="three-star" class="fa fa-star-o"></i></span>
                                    <span onclick="ratingChoose(this)"><i id="four-star" class="fa fa-star-o"></i></span>
                                    <span onclick="ratingChoose(this)"><i id="five-star" class="fa fa-star-o"></i></span>
                                    <span><input type="text" id="rating" name="rating" value="0"  readonly/>/5</span>
                                </div>
                            </p>
                            <input type="hidden" id="sort" name="sort" value="distance">
                        </div>
                        <div id="search-btn-loc">
                            <button type="button" onclick="findLatLng()">Search</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div id="footer">
            <?php include('php/footer.inc') ?>
        </div>
    </div>
</body>
</html>