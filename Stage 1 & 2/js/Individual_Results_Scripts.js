var arrayOfNumber = ["one","two","three","four","five","six","seven","eight","nine","ten","eleven","twelve","thirteen"];

function ratingChoose(item){
    var icons = item.firstChild;
    var itemId = icons.getAttribute("id");

    var oneStar = document.getElementById('one-star');
    var twoStar = document.getElementById('two-star');
    var threeStar = document.getElementById('three-star');
    var fourStar = document.getElementById('four-star');
    var fiveStar = document.getElementById('five-star');

    var stars = [oneStar,twoStar,threeStar,fourStar,fiveStar];
    var number = 0;
    for(var i = 0; i<stars.length;i++){
        if(itemId == (stars[i].getAttribute("id"))){
            number = i + 1;
        }
    }
    for(var j=0; j<stars.length;j++){
        if(stars[j].classList.contains("fa-star")){
            stars[j].classList.remove("fa-star");
            stars[j].classList.add("fa-star-o");
        }
    }
    for(var i = 0; i<number; i++){
        stars[i].classList.remove("fa-star-o");
        stars[i].classList.add("fa-star");
    }

    //update rating
    rating = document.getElementById("rating");
    var ratingCounter = 0;
    for(var i = 0; i<stars.length; i++){
        if(stars[i].classList.contains('fa-star')){
            ratingCounter += 1;
        }
    }
    rating.value = ratingCounter;

}

function ratingStarsDisplay(){
    var ratingValue = document.getElementById("avgRating").innerText;
    var ratingFloat = parseFloat(ratingValue);


    var oneStar = document.getElementById('avgOneStar');
    var twoStar = document.getElementById('avgTwoStar');
    var threeStar = document.getElementById('avgThreeStar');
    var fourStar = document.getElementById('avgFourStar');
    var fiveStar = document.getElementById('avgFiveStar');
    var stars = [oneStar,twoStar,threeStar,fourStar,fiveStar];

    for (var index = 1; index <= 5; index+= 0.5){
        if(index <= ratingFloat){
            if(index == 1){
                stars[index-1].classList.remove("fa-star-o");
                stars[index-1].classList.add("fa-star");
            }
            else if(index%1 == 0.5){
                stars[Math.round(index-1)].classList.remove("fa-star-o");
                stars[Math.round(index-1)].classList.add("fa-star-half-o");
            }else if(index%1 == 0){
                stars[index-1].classList.remove("fa-star-half-o");
                stars[index-1].classList.add("fa-star");
            }
        }else{break;}
    }
}

function setCoordinates(lat,lng,locationName,address){
    this.latt = lat;
    this.lngg = lng;
    this.locationName = locationName;
    this.address = address;
}

function initMap() {
    var Location = {lat: latt, lng: lngg};
    var options = {
        zoom: 16,
        center: Location
    }
    var maps = new google.maps.Map(document.getElementById("map"), options)

    addMarker(Location,locationName, address, maps);
  }

function addMarker(coords,nameOfLocation, addressLocation, map){
    var marker = new google.maps.Marker({
        position: coords,
        map: map
    });
    var infowindow = new google.maps.InfoWindow({
        content: '<h2>'+nameOfLocation+'</h2>'+
        '<p>'+addressLocation+'</p>'+
        `<button id="Direction-btn" onclick=window.open('https://www.google.com/maps/search/?api=1&query=${coords.lat},${coords.lng}');>Directions</button>`
    });
    marker.addListener('click', function(){
        infowindow.open(map,marker);
    });
}

function setRatings(rating, reviewID ){
    var ratingTag = document.getElementById(reviewID);
    for (var i = 0; i<5 ; i++){
        if(ratingTag.childNodes[i + i + 1].classList.contains("fa-star-o")){
            ratingTag.childNodes[i + i + 1].classList.remove("fa-star-o");
        }else if (ratingTag.childNodes[i + i + 1].classList.contains("fa-star")){
            ratingTag.childNodes[i + i + 1].classList.remove("fa-star");
        }
        ratingTag.childNodes[i + i + 1].classList.add("fa-star-o")
    }

    for(var i = 0; i<rating; i++){
        if(ratingTag.childNodes[i + i + 1].classList.contains("fa-star-o")){
            ratingTag.childNodes[i + i + 1].classList.remove("fa-star-o");
        }
        ratingTag.childNodes[i + i + 1].classList.add("fa-star");
    }
    ratingTag.childNodes[13].innerHTML = rating;
}


function intialiseMaps(){
    var mapScript = document.createElement('script');
    mapScript.type = "text/javascript";
    mapScript.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD-_Zd52SX6xAHEI15-WJm3iFA8LdKwL54&callback=initMap";
    document.body.appendChild(mapScript);
}

function setRatingStars(){
    var oneStar = document.getElementsByClassName("one-star");
    var twoStar = document.getElementsByClassName("two-star");
    var threeStar = document.getElementsByClassName("three-star");
    var fourStar = document.getElementsByClassName("four-star");
    var fiveStar = document.getElementsByClassName("five-star");
    var stars = [oneStar, twoStar,threeStar, fourStar, fiveStar];

    var numOfReviews = oneStar.length;
    var reviews = [];
    for(var index = 0; index < numOfReviews; index++){
        reviews.push(parseInt(document.getElementById("rating-"+arrayOfNumber[index]).innerText));
    }

    for(var reviewIndex = 0; reviewIndex < numOfReviews; reviewIndex++){
        var ratingValue = reviews[reviewIndex];
        for(var ratingIndex = 1; ratingIndex<=stars.length; ratingIndex++){
            if(ratingIndex <= ratingValue){
                stars[ratingIndex-1][reviewIndex].classList.remove("fa-star-o");
                stars[ratingIndex-1][reviewIndex].classList.add("fa-star");
            }else{break;}
        }
    }
}




function startMaps(latitude,longitude,locationName,address){
    setRatingStars();
    ratingStarsDisplay();
    setCoordinates(latitude,longitude,locationName,address);
    intialiseMaps();

}
