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
function getMySQLReviewData(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
                var myObj = JSON.parse(this.responseText);
                console.log(myObj);
                var first = true;
                var second = false;
            for(var i = 0; i<myObj.length ; i++){
                if(first){
                    document.getElementById("user0").innerHTML = myObj[i].FirstName + " " + myObj[i].LastName;
                    document.getElementById("datePublish0").innerHTML ="Date Published: " + myObj[i].DatePublished;
                    setRatings(myObj[i].Rating,"rating0")
                    document.getElementById("description0").innerHTML = myObj[i].ReviewDescription;
                    first = false;
                    second = true;                
                }else{
                    if (second){
                        var newReview = document.getElementById("review-one").cloneNode(true);
                        newReview.id = "review" + parseInt(i);
                        document.getElementById("review-one").after(newReview); 
                        newReview = document.getElementById("review" + parseInt(i));
                        second = false; 
                    }else{
                        newReview = document.getElementById("review" + parseInt(i-1)).cloneNode(true);
                        document.getElementById("review" + parseInt(i-1)).after(newReview);
                    }
                    newReview.id = "review" + parseInt(i);
                    newReview.children[0].id = "user" + parseInt(i);
                    newReview.children[1].id = "datePublish" + parseInt(i);
                    newReview.children[2].id = "rating" + parseInt(i);
                    newReview.children[3].id = "description" + parseInt(i);
                    console.log(document.getElementById("user" + parseInt(i)));
                    document.getElementById("user" + parseInt(i)).innerHTML = myObj[i].FirstName + " " + myObj[i].LastName;
                    document.getElementById("datePublish" + parseInt(i)).innerHTML ="Date Published: " + myObj[i].DatePublished;
                    setRatings(myObj[i].Rating,"rating" + parseInt(i));
                    document.getElementById("description" + parseInt(i)).innerHTML = myObj[i].ReviewDescription;
                }
            }
             
        }
    };
    xhr.open('GET', 'php/reviewbox.php',true);
    xhr.send();
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

function loadMapsAndData(){
    intialiseMaps(); 
    getMySQLReviewData();
}
