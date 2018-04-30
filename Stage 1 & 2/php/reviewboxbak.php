<?php
    $pdo = new PDO('mysql:host=localhost;dbname=wifinder-application','admin','BlackDragon123=');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $result = $pdo ->query('SELECT FirstName, LastName, DatePublished, Rating, ReviewDescription FROM reviews WHERE WifiHotspotName="Annerley Library Wifi"');
  $result_fetch = $result->fetchAll(PDO::FETCH_ASSOC);
  $firstName = array_fill(0,$result_fetch.length,null);
  $lastName = array_fill(0,$result_fetch.length,null);
  $datePublished = array_fill(0,$result_fetch.length,null);
  $rating = array_fill(0,$result_fetch.length,null);
  $reviewDescription = array_fill(0,$result_fetch.length,null);
  for($i = 0; $i<$result_fetch.length; $i++){
    $firstName[$i] = $result_fetch[$i]["FirstName"];
    $lastName[$i] = $result_fetch[$i]["LastName"];
    $datePublished[$i] = $result_fetch[$i]["DatePublished"];
    $rating[$i] = $result_fetch[$i]["Rating"];
    $reviewDescription[$i] = $result_fetch[$i]["ReviewDescription"];
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>
<div itemprop="review" itemscope itemtype="http://schema.org/Review" id="review-one">
  <h3 itemprop="author"><?php echo($firstName[0] ." ". $lastName[0]) ?> </h3>
  <h4 itemprop="datePublished">Date Publish: <?php echo($datePublished[0]) ?>  </h4>
    <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-o"></i>
        <meta itemprop="worstRating" content="1">
        <span itemprop="ratingValue"><?php echo($rating[0])?></span> /
        <span itemprop="bestRating">5</span> stars
    </div>
  <p itemprop="description"><?php echo ($reviewDescription[0])?></p>
</div>
