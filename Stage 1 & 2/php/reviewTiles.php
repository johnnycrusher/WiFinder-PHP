<?php
//a function that generates reviews based on the input data
function generateReviews($data){
    $numberArray = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten","eleven","twelve","thirteen","fourteen","fiftheen","sixteen","seventeen","eighteen","nineteen","twenty");
    $review = "";
    for ($index = 0; $index < sizeof($data); $index++) {
        $review .= "<div itemprop=\"review\" itemscope itemtype=\"http://schema.org/Review\" id=\"review-$numberArray[$index]\">\n";
            $review .= "<h3 itemprop=\"author\">". htmlspecialchars($data[$index]['Username'])."</h3>\n";
            $review .= "<h4 itemprop=\"datePublished\">Date Publish: ".$data[$index]['DatePublished']."</h4>\n";
            $review .= "<div itemprop=\"reviewRating\" itemscope itemtype=\"http://schema.org/Rating\">\n";
                $review .= "<i class=\"fa fa-star-o one-star\"></i>\n";
                $review .= "<i class=\"fa fa-star-o two-star\"></i>\n";
                $review .= "<i class=\"fa fa-star-o three-star\"></i>\n";
                $review .= "<i class=\"fa fa-star-o four-star\"></i>\n";
                $review .= "<i class=\"fa fa-star-o five-star\"></i>\n";
                $review .= "<meta itemprop=\"worstRating\" content=\"1\">\n";
                $review .= "<span itemprop=\"ratingValue\" id=\"rating-$numberArray[$index]\">".$data[$index]['Rating']."</span> /\n";
                $review .= "<span itemprop=\"bestRating\">5</span> stars\n";
                $review .= "</div>\n";
            $review .= "<p itemprop=\"description\">".htmlspecialchars($data[$index]['ReviewDescription'])."</p>\n";
        $review .= "</div>\n";
        $review .= "<br>\n";
    }
    return $review;
}
?>


