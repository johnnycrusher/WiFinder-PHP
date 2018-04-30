var mapElements = ["map-item-one", "map-item-two", "map-item-three", "map-item-four", "map-item-five"];
function intialiseMaps(){
    var mapScript = document.createElement('script');
    mapScript.type = "text/javascript";
    mapScript.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD-_Zd52SX6xAHEI15-WJm3iFA8LdKwL54&callback=initMap";
    document.body.appendChild(mapScript);
}

function initMap() {
    var location= [{"lat": -27.5094, "lng": 153.033},
        {"lat":-27.50909038,"lng":153.0259709},
        {"lat":-27.49803575,"lng":153.043655},	
        {"lat":-27.52552,"lng":153.06923},
        {"lat":-27.56244221,"lng":153.0809183}];

    var AnnerleyLibraryWifi = {lat: -27.5094, lng: 153.033};
    var options = [];
    for(var i = 0; i<location.length;i++){
        options[i] = {
            zoom: 16,
            center: location[i]
        }
    }
    options[i] = {
        zoom: 16,
        center: AnnerleyLibraryWifi
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
function opensite(){
    window.open("Individual_Result_Page.html","_self",false)
}
