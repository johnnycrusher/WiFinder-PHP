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
</head>

<body>
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
                <form action="search_results_page.php" method="POST">
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
                        </div>              
                        <div id="advanced-options">
                            <h4>Narrow your search results by...</h4>
                            <p>Searching for:
                                <select name="location-type">
                                    <option value="address">Address</option>
                                    <option value="suburb">Suburb</option>
                                </select>
                            </p>
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
                                </div>
                            </p>
                        </div>
                        <div id="search-btn-loc">
                            <button type="submit">Search</button>
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