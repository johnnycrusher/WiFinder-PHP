var mapElements = ["map-item-one", "map-item-two", "map-item-three", "map-item-four", "map-item-five",
                    "map-item-six", "map-item-seven", "map-item-eight", "map-item-nine", "map-item-ten",
                    "map-item-eleven","map-item-twelve", "map-item-thirteen", "map-item-fourteen", "map-item-fifteen",
                    "map-item-sixteen","map-item-seventeen", "map-item-eighteen", "map-item-nineteen", "map-item-twenty"];
var arrayOfNumber = ["one","two","three","four","five","six","seven","eight","nine","ten",
                     "eleven","twelve","thirteen","fourteen","fifteen","sixteen","seventeen","eighteen","nineteen", "twenty"];
var location;
var locationLength = 0;
function intialiseMaps(){
    var mapScript = document.createElement('script');
    mapScript.type = "text/javascript";
    mapScript.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD-_Zd52SX6xAHEI15-WJm3iFA8LdKwL54&callback=initMap";
    document.body.appendChild(mapScript);
}



function setLocation(locationPlace){
    for(var i = 0; i< locationPlace.length; i++){
        this.location[i] = locationPlace[i];
    }
    this.locationLength = locationPlace.length;

}

function setRatingStars(){
    var oneStar = document.getElementsByClassName("one-star");
    var twoStar = document.getElementsByClassName("two-star");
    var threeStar = document.getElementsByClassName("three-star");
    var fourStar = document.getElementsByClassName("four-star");
    var fiveStar = document.getElementsByClassName("five-star");
    var stars = [oneStar, twoStar,threeStar, fourStar, fiveStar];

    var numOfSearchResults = oneStar.length;
    var reviews = [];
    for(var index = 0; index < numOfSearchResults; index++){
        reviews.push(parseFloat(document.getElementById("rating-"+arrayOfNumber[index]).innerText));
    }

    for(var reviewIndex = 0; reviewIndex < numOfSearchResults; reviewIndex++){
        var ratingValue = reviews[reviewIndex];
        for(var ratingIndex = 1; ratingIndex<=stars.length; ratingIndex += 0.5){
            if(ratingIndex <= ratingValue){
                if(ratingIndex == 1){
                    stars[ratingIndex-1][reviewIndex].classList.remove("fa-star-o");
                    stars[ratingIndex-1][reviewIndex].classList.add("fa-star");
                }else if(ratingIndex%1 == 0.5) {
                    stars[Math.round(ratingIndex-1)][reviewIndex].classList.remove("fa-star-o");
                    stars[Math.round(ratingIndex-1)][reviewIndex].classList.add("fa-star-half-o");
                }else if(ratingIndex%1 == 0){
                    stars[ratingIndex-1][reviewIndex].classList.remove("fa-star-half-o");
                    stars[ratingIndex-1][reviewIndex].classList.add("fa-star");
                }

            }else{break;}
        }
    }
}


function initMap() {

    var options = [];
    for(var i = 0; i<locationLength;i++){
        options[i] = {
            zoom: 16,
            center: location[i]
        }
    }
    var maps = [];
    for(var i = 0; i<mapElements.length; i++){
        maps[i] = new google.maps.Map(document.getElementById(mapElements[i]), options[i]) 
        addMarker(location[i], maps[i]);
    }
}
function addMarker(coords , map){
    var marker = new google.maps.Marker({
        position: coords,
        map: map
    });
}
function opensite(location){
    window.open("Individual_Result_Page.php?location=" + location,"_self",false)
}

function startMaps(location){
    setRatingStars()
    setLocation(location);
    intialiseMaps()
}
