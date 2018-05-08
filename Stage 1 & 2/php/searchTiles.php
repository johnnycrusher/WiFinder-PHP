<?php

function generateSearchTiles($data){
    $numberArray = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten");
    $html = "";
    for ($index = 0; $index < sizeof($data); $index++) {
        $html .= "<div class=\"item-box\" >";
        $html .= "<div id = \"map-item-$numberArray[$index]\" class=\"map\" onclick = \"opensite()\" ></div>";
        $html .= "<div id = \"location-info-$numberArray[$index]\" class=\"location-info\" >";
            $html .= "<div id = \"wifiLocation$numberArray[$index]\" >";
                $html .= "<h2 class=\"wifiName\" >";
            $html .= "<a href ="."Individual_Result_Page.php?location=".urlencode($data[$index]['wifiHotspotname']).">".$data[$index]['wifiHotspotname']."</a>";
            $html .= "</h2 >";
            $html .= "<p class=\"rating\" >";
            $html .= "<i class=\"fa fa-star\" ></i >";
            $html .= "<i class=\"fa fa-star\" ></i >";
            $html .= "<i class=\"fa fa-star\" ></i >";
            $html .= "<i class=\"fa fa-star\" ></i >";
            $html .= "<i class=\"fa fa-star-o\" ></i >";
            $html .= "4 / 5 stars";
                $html .= "</p >";
            $html .= "<p class=\"address\" > Address:" . $data[$index]['Address'] . "," . $data[$index]['Suburb'] . "</p >";
            $html .= "<p class=\"location\" > Location:" . $data[$index]['LocationType'] . "</p >";
            $html .= "</div >";
            $html .= "</div >";
            $html .= "</div >";
        }
    return $html;
}
?>

