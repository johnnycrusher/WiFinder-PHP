<?php
function generateReviews($data){
    $numberArray = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten","eleven","twelve","thirteen","fourteen","fiftheen","sixteen","seventeen","eighteen","nineteen","twenty");
    $review = "";
    for ($index = 0; $index < sizeof($data); $index++) {
        $review .= "<div itemprop=\"review\" itemscope itemtype=\"http://schema.org/Review\" id=\"review-$numberArray[$index]\">";
            $review .= "<h3 itemprop=\"author\">". $data[$index]['FirstName']. " " .$data[$index]['LastName']."</h3>";
            $review .= "<h4 itemprop=\"datePublished\">Date Publish: ".$data[$index]['DatePublished']."</h4>";
            $review .= "<div itemprop=\"reviewRating\" itemscope itemtype=\"http://schema.org/Rating\">";
                $review .= "<i class=\"fa fa-star-o\"></i>";
                $review .= "<i class=\"fa fa-star-o\"></i>";
                $review .= "<i class=\"fa fa-star-o\"></i>";
                $review .= "<i class=\"fa fa-star-o\"></i>";
                $review .= "<i class=\"fa fa-star-o\"></i>";
                $review .= "<meta itemprop=\"worstRating\" content=\"1\">";
                $review .= "<span itemprop=\"ratingValue\" id=\"rating-$numberArray[$index]\">".$data[$index]['Rating']."</span> /";
                $review .= "<span itemprop=\"bestRating\">5</span> stars";
                $review .= "</div>";
            $review .= "<p itemprop=\"description\">".$data[$index]['ReviewDescription']."</p>";
        $review .= "</div>";
    }
    return $review;
}
?>


