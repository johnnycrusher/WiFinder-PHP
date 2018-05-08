myCoords = {"lat": "","lng": ""};
var mapsIntailised = false;
var geocoder;
var geocoderGeneratred = false;

function getLocation(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(storeLocation);
    }
}

function storeLocation(position){
    myCoords={"lat": position.coords.latitude , "lng": position.coords.longitude};
    document.getElementById("latitude").value = myCoords.lat;
    document.getElementById("longitude").value = myCoords.lng;
    intialiseMaps();
}

function initMap(){
    if(!geocoderGeneratred){
        geocoder = new google.maps.Geocoder;
        geocoderGeneratred = true;
    }
    findAddress(geocoder);
}

function findAddress(geocoder){
    geocoder.geocode({'location': myCoords}, function(results, status){
        if (status === 'OK'){
            document.getElementById("search-box").value = results[0].address_components[0].long_name + " " + results[0].address_components[1].long_name + ", " + results[0].address_components[2].long_name;
        }
    });
}

function intialiseMaps(){
    if(!mapsIntailised){
        var mapScript = document.createElement('script');
        mapScript.type = "text/javascript";
        mapScript.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD-_Zd52SX6xAHEI15-WJm3iFA8LdKwL54&callback=initMap";
        document.body.appendChild(mapScript);
        mapsIntailised = true;
    }
    else{
       initMap();
    }
}
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
function determineRating(){
    rating = document.getElementById("rating");

    var oneStar = document.getElementById('one-star');
    var twoStar = document.getElementById('two-star');
    var threeStar = document.getElementById('three-star');
    var fourStar = document.getElementById('four-star');
    var fiveStar = document.getElementById('five-star');

    var stars = [oneStar,twoStar,threeStar,fourStar,fiveStar];
    var ratingCounter = 0;

    for(var i = 0; i<stars.length; i++){
        if(stars[i].classList.contains(fa-star)){
            ratingCounter += 1;
        }
    }
}
