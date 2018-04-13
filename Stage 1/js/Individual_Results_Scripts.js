function ratingHover(item){
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
    for(var i = 0; i<number; i++){
        stars[i].classList.remove("fa-star-o");
        stars[i].classList.add("fa-star");
    }
}
function ratingHoverOut(){
    var oneStar = document.getElementById('one-star');
    var twoStar = document.getElementById('two-star');
    var threeStar = document.getElementById('three-star');
    var fourStar = document.getElementById('four-star');
    var fiveStar = document.getElementById('five-star');

    var stars = [oneStar,twoStar,threeStar,fourStar,fiveStar];

    for(var i = 0; i<5; i++){
        stars[i].classList.remove("fa-star");
        stars[i].classList.add("fa-star-o");
    }
};
function ratingChoose(){
    var oneStar = document.getElementById('one-star');
    var twoStar = document.getElementById('two-star');
    var threeStar = document.getElementById('three-star');
    var fourStar = document.getElementById('four-star');
    var fiveStar = document.getElementById('five-star');

    var stars = [oneStar,twoStar,threeStar,fourStar,fiveStar];
    for( var i = 0; i<stars.length; i++ ){
        stars[i].parentNode.removeEventListener("mouseover",ratingHover,false);
    }
}

function initMap() {
    var AnnerleyLibraryWifi = {lat: -27.5094, lng: 153.033};
    var options = {
        zoom: 16,
        center: AnnerleyLibraryWifi
    }
    var maps = new google.maps.Map(document.getElementById("map"), options)

    addMarker(AnnerleyLibraryWifi, maps);
  }

function addMarker(coords , map){
    var marker = new google.maps.Marker({
        position: coords,
        map: map
    });
    console.log("`lat : ${coords.lat}`");
    console.log("`lng ${coords.lng}`");
    var infowindow = new google.maps.InfoWindow({
        content: '<h2>Annerly Library Wifi</h2>'+
        '<p>450 Ipswich Road, Annerley,4103</p>'+
        `<button onclick=window.open('https://www.google.com/maps/search/?api=1&query=${coords.lat},${coords.lng}');>Directions</button>`
    });
    marker.addListener('click', function(){
        infowindow.open(map,marker);
    });
}

function intialiseMaps(){
    var mapScript = document.createElement('script');
    mapScript.type = "text/javascript";
    mapScript.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyD-_Zd52SX6xAHEI15-WJm3iFA8LdKwL54&callback=initMap";
    document.body.appendChild(mapScript);
}
