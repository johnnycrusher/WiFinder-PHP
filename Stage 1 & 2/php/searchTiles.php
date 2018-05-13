<?php

function generateSearchTiles($data){
    $numberArray = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten","eleven","twelve","thirteen","fourteen","fifteen","sixteen","seventeen","eighteen","nineteen","twenty");
    $html = "";
    for ($index = 0; $index < sizeof($data); $index++) {
        $html .= "<div class=\"item-box\" >";
        $html .= "<div id =\"map-item-$numberArray[$index]\" class=\"map\" onclick = opensite(". "'".urlencode($data[$index]['WifiHotspotName'])."'".")></div>";
        $html .= "<div id = \"location-info-$numberArray[$index]\" class=\"location-info\" >";
            $html .= "<div id = \"wifiLocation-$numberArray[$index]\" >";
                $html .= "<h2 class=\"wifiName\" >";
                    $html .= "<a href ="."Individual_Result_Page.php?location=".urlencode($data[$index]['WifiHotspotName']).">".$data[$index]['WifiHotspotName']."</a>";
                $html .= "</h2 >";
                $html .= "<p class=\"rating\" >";
                    $html .= "<i class=\"fa fa-star-o one-star\"></i >";
                    $html .= "<i class=\"fa fa-star-o two-star\"></i >";
                    $html .= "<i class=\"fa fa-star-o three-star\"></i >";
                    $html .= "<i class=\"fa fa-star-o four-star\"></i >";
                    $html .= "<i class=\"fa fa-star-o five-star\"></i >";
                    $html .= "<span id='rating-$numberArray[$index]'> ".$data[$index]['AvgReview']."</span>/ 5 stars";
                $html .= "</p >";
                $html .= "<p class=\"address\" > Address:" . $data[$index]['Address'] . "," . $data[$index]['Suburb'] . "</p >";
                $html .= "<p class=\"location\" > Location:" . $data[$index]['LocationType'] . "</p >";
                $html .= "<p class=\"distance\" > Distance from you: " . round($data[$index]['distance'],2) . "km</p >";
                $html .= "</div >";
                $html .= "</div >";
                $html .= "</div >";
        }
    return $html;
}
?>

