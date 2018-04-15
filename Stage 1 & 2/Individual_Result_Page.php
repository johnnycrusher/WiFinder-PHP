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
                <div id="logo-elements" class="center-items">
                    <img src="img/logo46.svg" width="100px" height="100px">
                    <h1>Wi-Finder</h1>
                </div>
                <div id="header-text" class="center-items">
                    <h1>WiFi Location</h1>
                </div>
            </div>
            <div id="header-fill-left"></div>
            <div id="header-fill-right"></div>
            <div id="menubar">
                <div id="button-loc">
                    <a href="search_page.html" id="search-menu" class="menu-btn">Search <i class="fa fa-search"></i></a>
                    <a href="Registration_Page.html" id="sign-up-menu"class="menu-btn">Sign-Up <i class="fa fa-user-plus"></i></a>
                    <a href="login_page.html" id="login-menu" class="menu-btn">Login <i class="fa fa-user-o"></i></a>
                </div>
            </div>
            <div itemscope itemtype="http://schema.org/Place" id="content">
                <div id="map"></div>
                <div id="WiFi-location-info-box">
                        <span itemprop="name"><h2>Annerly Library Wifi</h2></span>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                            <span itemprop="ratingValue">4</span>/5
                            based on <span itemprop="reviewCount">2</span> customer reviews
                        </div>
                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <meta itemprop="name" content="Annerly Library Wifi">
                        <span itemprop="streetAddress">450 Ipswich Road</span>,
                        <span itemprop="addressRegion">Annerley</span>,
                        <span itemprop="addressRegion">QLD</span>,
                        <span itemprop="postalCode">4103</span>
                    </div>
                </div>
                <div id="write-review-box" class="white-boxes">
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
                </div>
                <div id="review-box" class="white-boxes">
                    <h2>Reviews:</h2>
                    <?php include('php/reviewbox.php'); ?>
                </div>
            </div>

            <div id="footer">
                <div id="Our-Mission-Text">
                    <h2>Our Mission</h2>
                    <p>WiFinder mission is to conntect the citizens of Brisbane with location data on where the closest Free Wifi-Location.
                        To ensure they stay connected to the internet</p>
                </div>
                <div id="connect-with-us">
                    <h2>Connect With Us On:</h2>
                    <a href="" style="Color:White"><i class="fa fa-facebook-square fa-3x"></i></a>
                    <a href="" style="Color:White"><i class="fa fa-instagram fa-3x"></i></a>
                    <a href="" style="Color:White"><i class="fa fa-twitter-square fa-3x"></i></a>
                </div>
            </div>
            <div id="footer-fill-left"></div>
            <div id="footer-fill-right"></div>
        </div>
    </body>
</html>
