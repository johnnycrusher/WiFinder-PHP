var mapElements = ["map-item-one", "map-item-two", "map-item-three", "map-item-four", "map-item-five",
                    "map-item-six", "map-item-seven", "map-item-eight", "map-item-nine", "map-item-ten",
                    "map-item-eleven","map-item-twelve", "map-item-thirteen", "map-item-fourteen", "map-item-fifteen",
                    "map-item-sixteen","map-item-seventeen", "map-item-eighteen", "map-item-nineteen", "map-item-twenty"];
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
    setLocation(location);
    intialiseMaps()
}
