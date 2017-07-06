<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">


    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <style>
   
    html, body {
      height: 100%;
      margin: 0px;
      padding: 0px;
    }
    #map-canvas {
      height: 100%;
      margin: 0px;
      padding: 0px;
    }

      #nothingFound {
      display: none;
      z-index: 9999;
      position: absolute;
      bottom: 30px;
      right: 60px;
      height: 81px;
      padding: 20px;
      vertical-align: middle;
      text-align: center;
      font-size: 13px !important;
      border-radius: 3px;
      width: 235px;
      background-color: black;
      color: white;
      font-weight: bold;
      /* border: 1px solid #cecece; */
      opacity: .7;
    }

    .dialog_content {
      min-width: 250px;
    }

    a {
      color: black;
    }

    .object_title {
      color: #ec1d24;
    }

</style>
</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<script>



// This example displays a marker at the center of Australia.
// When the user clicks the marker, an info window opens.

var map;
var markers = [];



function initialize() {  
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(42.25, 43.80),
    mapTypeControl: true,
    mapTypeControlOptions: {
        position: google.maps.ControlPosition.TOP_RIGHT
    }
  };
var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

google.maps.event.addDomListener(window, "resize", function() {
    var center = map.getCenter();
    google.maps.event.trigger(map, "resize");
    map.setCenter(center); 
});


function putMarkers(link) {

var bounds = new google.maps.LatLngBounds();
// mivigot gafiltruli obiektebi
$.get(link, function( data ) {
locations = eval("(" + data + ")");
if(locations.length==0) {
$('#nothingFound').show();
return;
}
else {
$('#nothingFound').hide();

}



    var infowindow = new google.maps.InfoWindow();


    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][3],locations[i][2]),
        icon: locations[i][5], 
        map: map,
        title: locations[i][1]
      });

      markers.push(marker);

//extend the bounds to include each marker's position
  bounds.extend(marker.position);


      // informaciis dialogi
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            $.get( "/dialog/"+locations[i][0]+"/"+locations[i][1], function( data ) {
                      infowindow.setContent(data);
                      infowindow.open(map, marker);
                    });
          
        }
      })(marker, i));
    }

// რუკაზე განთავსებულ მარკერებზე ხდება დაზუმვა
// რადგან ბათუმი არ ჩანდა, დავაპატარავეთ რუკა


        // var sw = bounds.getSouthWest();
        // var ne = bounds.getNorthEast();

        // var lat1 = sw.lat();
        // var lng1 = sw.lng();
        // var lat2 = ne.lat();
        // var lng2 = ne.lng();

        // var dx = (lng1 - lng2) / 2.;
        // var dy = (lat1 - lat2) / 2.;
        // var cx = (lng1 + lng2) / 2.;
        // var cy = (lat1 + lat2) / 2.;

        // // work around a bug in google maps...///
        // lng1 = cx + dx * 1.5;
        // lng2 = cx - dx * 1.5;
        // lat1 = cy + dy * 1.5;
        // lat2 = cy - dy * 1.5;
        // /////////////////////////////////////////
        
        // sw = new google.maps.LatLng(lat1,lng1);
        // ne = new google.maps.LatLng(lat2,lng2);
        // bounds = new google.maps.LatLngBounds(sw,ne);
        // map.fitBounds(bounds);

});
}
//end of putMarkers()
putMarkers('/markers');

}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="map-canvas"></div>



  </body>
</html> a