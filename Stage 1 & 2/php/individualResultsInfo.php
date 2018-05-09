<?php
$data = retrieveLocationResults($_GET['location']);
?>
<div id="WiFi-location-info-box">
    <span itemprop="name"><h2><?php echo($data[0]['WifiHotspotName']) ?></h2></span>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star-o"></i>
    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
        <span itemprop="ratingValue"><?php echo($data[0]['AverageRating']) ?></span>/5
        based on <span itemprop="reviewCount"><?php echo($data[0]['NumberOfRatings'])?></span> customer reviews
    </div>
    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <meta itemprop="name" content="Annerly Library Wifi">
        <span itemprop="streetAddress"><?php echo($data[0]['Address'])?></span>,
        <span itemprop="addressRegion"><?php echo($data[0]['Suburb'])?></span>,
    </div>
</div>
