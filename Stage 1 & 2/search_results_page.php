<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <link href="css/search_results_page_style.css" rel="stylesheet" type="text/css" />
  <script src="js/search_results_page_script.js" type="text/javascript"></script>
  
</head>

<body onload="intialiseMaps()">
  <div class="grid">

    <!--header and various fills-->
    <div id="header">
      <div id="header-text">
        <h1>Results</h1>
      </div>
    </div>
    <div id="header-right"></div>
    <div id="menubar">
        <div id="button-loc">
            <a href="search_page.html" id="search-menu" class="menu-btn">Search <i class="fa fa-search"></i></a>
            <a href="Registration_page.html" id="sign-up-menu"class="menu-btn">Sign-Up <i class="fa-user-plus-o"></i></a>
            <a href="Login_Page.html" id="login-menu" class="menu-btn">Login <i class="fa fa-user-o"></i></a>
        </div>
    </div>

      <!--filters bar for search results-->
    <div id="filter-bar">
      <h2>
        In INSERTNAME Area...
      </h2>
      <div class="filter-options">
        <a href="">Highest Rating</a>
      </div>
      <div class="filter-options">
        <a href="">Closest</a>
      </div>
    </div>

    <!--content area and various fills-->
    <div id="content">
      <!--Search results up to five per page-->
      <div id="results">
        <div class="item-box">
          <div id="map-item-one" class="map"onclick="opensite()"></div>
          <div class="location-info">
              <h2>
                <a href="Individual_Result_Page.html">Wifi Spot NAME</a>
              </h2>
              <h3>
                2/8 Stars
              </h3>
          </div>
        </div>

        <div class="item-box">
            <div id="map-item-two" class="map"></div>
            <div class="location-info">
              <h2>
                <a href="">Wifi Spot NAME</a>
              </h2>
              <h3>
                7/8 Stars
              </h3>
            </div>
            
        </div>

        <div class="item-box">
          <div id="map-item-three" class="map"></div>
          <div class="location-info">
            <h2>
              <a href="">Wifi Spot NAME</a>
            </h2>
            <h3>
              42/8 Stars
            </h3>
          </div>
        </div>

        <div class="item-box">
          <div id="map-item-four" class="map"></div>
          <div class="location-info">
            <h2>
              <a href="">Wifi Spot NAME</a>
            </h2>
            <h3>
              2/8 Stars
            </h3>
          </div>
        </div>

        <div class="item-box">
          <div id="map-item-five" class="map"></div>
          <div class="location-item">
            <h2>
              <a href="">Wifi Spot NAME</a>
            </h2>
            <h3>
              42/8 Stars
            </h3>
          </div>
        </div>

      </div>
      <!--end of results-->
      <div id="map-sidebar">
      </div>

    </div>
    <!--end of content left-->

    <!-- interactable map-->
    <div class="map_area">
      <div class="map"> </div>
      <div class="search_button">

      </div>
    </div>
  </div>
  <!-- footer -->
  <div id="footer">
    <p>Top of page</p>
  </div>

  </div>
  <!--end of body-->

</body>

</html>