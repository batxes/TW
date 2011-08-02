//$(document).ready(function(){
//    {
//      if (GBrowserIsCompatible()) {
//        var map = new GMap2(document.getElementById("map"));
//        map.setCenter(new GLatLng(40.396764,-3.713379), 6);
//        map.addControl(new GMapTypeControl());
//        map.addControl(new GLargeMapControl());
//        map.addControl(new GScaleControl());
//        map.addControl(new GOverviewMapControl());
//        function addtag(point, address) {
//        var marker = new GMarker(point);
//        GEvent.addListener(marker, "click", function() {
//	marker.openInfoWindowHtml(address); } );
//        return marker;
//        }
//        var point = new GLatLng(40.396764,-3.713379);
//        var address = '<b>MADAGASCAR</b><br/><i>Centro de Madagascar</i><br /><a href="http://www.centrodemadagascar.com">Web del Centro de Madagascar</a>';
//        var marker = addtag(point, address);
//       map.addOverlay(marker);
//
//      }
//    }
//});


var initialLocation;
var marker;
var siberia = new google.maps.LatLng(60, 105);
var newyork = new google.maps.LatLng(40.69847032728747, -73.9514422416687);
var browserSupportFlag =  new Boolean();
var map;
var infowindow = new google.maps.InfoWindow();

function initialize() {
  var myOptions = {
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  // Try W3C Geolocation method (Preferred)
  
  if(navigator.geolocation) {
    browserSupportFlag = true;
    navigator.geolocation.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      marker = new google.maps.Marker({
      position: initialLocation
        });
marker.setMap(map);
      contentString = "Usted se encuentra aquí";
      map.setCenter(initialLocation);
      infowindow.setContent(contentString);
      infowindow.setPosition(initialLocation);
      infowindow.open(map);
    }, function() {
      handleNoGeolocation(browserSupportFlag);
    });
  } else if (google.gears) {
    // Try Google Gears Geolocation
    browserSupportFlag = true;
    var geo = google.gears.factory.create('beta.geolocation');
    geo.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
      contentString = "Usted se encuentra aquí";
      map.setCenter(initialLocation);
      infowindow.setContent(contentString);
      infowindow.setPosition(initialLocation);
      infowindow.open(map);
    }, function() {
      handleNoGeolocation(browserSupportFlag);
    });
  } else {
    // Browser doesn't support Geolocation
    browserSupportFlag = false;
    handleNoGeolocation(browserSupportFlag);
  }
  
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag == true) {
    initialLocation = newyork;
    contentString = "Error: The Geolocation service failed.";
  } else {
    initialLocation = siberia;
    contentString = "Error: Your browser doesn't support geolocation. Are you in Siberia?";
  }
  map.setCenter(initialLocation);
  infowindow.setContent(contentString);
  infowindow.setPosition(initialLocation);
  infowindow.open(map);
}