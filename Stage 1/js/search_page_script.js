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
    console.log("done");
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
