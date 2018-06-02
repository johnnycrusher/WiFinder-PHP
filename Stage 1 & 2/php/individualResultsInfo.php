<?php
//store data  by calling a function  required is already in the page it is imported in
$data = retrieveLocationResults($_GET['location']);
//echo all the data in the approirate locations
?>
<div id="WiFi-location-info-box">
    <h2 itemprop="name"><?php echo($data[0]['WifiHotspotName'])?></h2>
    <i class="fa fa-star-o" id="avgOneStar"></i>
    <i class="fa fa-star-o" id="avgTwoStar"></i>
    <i class="fa fa-star-o" id="avgThreeStar"></i>
    <i class="fa fa-star-o" id="avgFourStar"></i>
    <i class="fa fa-star-o" id="avgFiveStar"></i>
    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
        <span itemprop="ratingValue" id="avgRating" onclick="ratingStarsDisplay()"><?php echo($data[0]['AverageRating']) ?></span>/5
        based on <span itemprop="reviewCount"><?php echo($data[0]['NumberOfRatings'])?></span> customer reviews
    </div>
    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <meta itemprop="name" content="Annerly Library Wifi">
        <span itemprop="streetAddress"><?php echo($data[0]['Address'])?></span>,
        <span itemprop="addressRegion"><?php echo($data[0]['Suburb'])?></span>,
    </div>
</div>
