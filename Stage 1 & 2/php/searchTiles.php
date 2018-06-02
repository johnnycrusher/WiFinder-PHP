<?php
//A function that generates search tiles based on the input data
function generateSearchTiles($data,$distanceBoolean){
    $numberArray = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten","eleven","twelve","thirteen","fourteen","fifteen","sixteen","seventeen","eighteen","nineteen","twenty");
    $html = "";
    for ($index = 0; $index < sizeof($data); $index++) {
        $html .= "<div class=\"item-box\" >\n";
        $html .= "<div id =\"map-item-$numberArray[$index]\" class=\"map\" onclick = \"opensite("."'".urlencode($data[$index]['WifiHotspotName'])."'".")\"></div>\n";
        $html .= "<div id = \"location-info-$numberArray[$index]\" class=\"location-info\" >\n";
            $html .= "<div id = \"wifiLocation-$numberArray[$index]\" >\n";
                $html .= "<h2 class=\"wifiName\" >\n";
                    $html .= "<a href ="."\"Individual_Result_Page.php?location=".urlencode($data[$index]['WifiHotspotName'])."\">".$data[$index]['WifiHotspotName']."</a>\n";
                $html .= "</h2 ><br>\n";
                $html .= "<p class=\"rating\" >\n";
                    $html .= "<i class=\"fa fa-star-o one-star\"></i >\n";
                    $html .= "<i class=\"fa fa-star-o two-star\"></i >\n";
                    $html .= "<i class=\"fa fa-star-o three-star\"></i >\n";
                    $html .= "<i class=\"fa fa-star-o four-star\"></i >\n";
                    $html .= "<i class=\"fa fa-star-o five-star\"></i >\n";
                    $html .= "<span id='rating-$numberArray[$index]'> ".$data[$index]['AvgRating']."</span>/ 5 stars\n";
                $html .= "</p >\n";
                $html .= "<p class=\"address\" > Address:" . $data[$index]['Address'] . "," . $data[$index]['Suburb'] . "</p >\n";
                $html .= "<p class=\"location\" > Location:" . $data[$index]['LocationType'] . "</p >\n";
                if($distanceBoolean){
                    $html .= "<p class=\"distance\" > Distance from you: " . round($data[$index]['distance'],2) . "km</p >\n";
                }
                $html .= "</div >\n";
                $html .= "</div >\n";
                $html .= "</div >\n";
    }
    return $html;
}
?>

