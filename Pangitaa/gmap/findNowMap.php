<!DOCTYPE html> 
<html> 
<head> 
  <link href="../resources/CSS/findNowMap.css" rel="stylesheet"/>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
 <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>

    <script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js" type="text/javascript"></script>
  <style type="text/css">
  h4, h5, h6{
    color: black;
  }
  </style>
  <script type="text/javascript">    
    //declare namespace

    var map;



  function load() {
      map = new google.maps.Map(document.getElementById('map_canvas'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 17,
      mapTypeId:google.maps.MapTypeId.HYBRID
    });

    var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('<h6 style="color:black;">Your Location</h6>');
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

  var input = /** @type {!HTMLInputElement} */(
      document.getElementById('address1'));

 
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });



  autocomplete.addListener('place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
 

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div style="color: black;"><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);


  });
}

    var gmarkers = new Array();
    function showMarkers() {

      var marker;
      var infoWindow = new google.maps.InfoWindow;
      var e = document.getElementById("comboboxFindNow");
      var selected = e.options[e.selectedIndex].text;
      var urlString;
      urlString = "../gmap/markerajaxsql_findnow.php?category="+ selected +"";
      
      // var searchString = document.getElementById("address2").value;
      // urlString = "../gmap/markerajaxsql_findnow.php?category="+ selected +"?searchString="+searchString+"";

      if(selected==null || selected=="Category"){
        return;
      }
      else{

    
      downloadUrl(urlString, function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        deleteMarkers();
        marker =null;
        for (var i = 0; i < markers.length; i++) {
          var business_name = markers[i].getAttribute("business_name");
          var street_address = markers[i].getAttribute("street_address");
          var business_phone = markers[i].getAttribute("business_phone");
          var email = markers[i].getAttribute("email");
          var img = markers[i].getAttribute("img");

          if(email == "")
            email = "none";

          var point = new google.maps.LatLng(
               parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
              marker = new google.maps.Marker({
              map: map, 
              position: point
          });
          var html = "<h4>" + business_name + "</h4><h5>Main Address: </h5><h6>" + street_address + "</h6><h5>Business Phone: </h5><h6>" + business_phone + "</h6><h5>Email: </h5><h6>" + email + "</h6>" + "<a target='_blank' href=../function/uploads/estpic/"+img+">Establishment Image </a>";
          gmarkers.push(marker);
          map.panTo(marker.getPosition());
          map.setZoom(9); 

          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }
    }

    function clickbuttonShowLocationMarker(){

      var marker;
      var infoWindow = new google.maps.InfoWindow;
      var e = document.getElementById("comboboxFindNow");
      var selected = e.options[e.selectedIndex].text;
      var urlString;
      var searchString = document.getElementById("address2").value;
      var bounds = new google.maps.LatLngBounds();

      urlString = "../gmap/markerajaxsql_findnow.php?category="+ selected +"&searchString="+searchString+"";

      if(selected==null || selected=="Category"){
        return;
      }
      else{

      downloadUrl(urlString, function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        deleteMarkers();
        marker =null;
        for (var i = 0; i < markers.length; i++) {
          var business_name = markers[i].getAttribute("business_name");
          var street_address = markers[i].getAttribute("street_address");
          var business_phone = markers[i].getAttribute("business_phone");
          var email = markers[i].getAttribute("email");
          var img = markers[i].getAttribute("image_name");

          if(email == "")
            email = "none";

          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
              marker = new google.maps.Marker({
              map: map, 
              position: point
          });
          var html = "<h4>" + business_name + "</h4><h5>Main Address: </h5><h6>" + street_address + "</h6><h5>Business Phone: </h5><h6>" + business_phone + "</h6><h5>Email: </h5><h6>" + email + "</h6>" + "<a href=../function/uploads/estpic/'"+img+"'>Establishment Image </a>";
          var loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
          bounds.extend(loc);
          gmarkers.push(marker);
          map.panTo(marker.getPosition());
          map.setZoom(9); 
          map.fitBounds(bounds); 
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    }
    function showHideMarker(){
        var e = document.getElementById("checkbox");
        if(e.checked){
           showMark();
        }
        else{
          clearMarkers();
        }
    }
   // Sets the map on all markers in the array.
    function setMapOnAll(map) {
      for (var i = 0; i < gmarkers.length; i++) {
        gmarkers[i].setMap(map);
      }
    }

// Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
    
      setMapOnAll(null);
    }
    // Shows any markers currently in the array.
    function showMark() {
    setMapOnAll(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
      clearMarkers();
      markers = [];
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);

        var bounds = new google.maps.LatLngBounds();
        
          var loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
          bounds.extend(loc);
            map.fitBounds(bounds); 
      });
    }
    
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

  </script> 
</head>

<body onload="load()"> 
<div class="container">
  <h4>Search through: </h4>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Google Map</a></li>
    <li><a data-toggle="tab" href="#menu1">Pangitaa</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
       <input class="form-control" type="text" id="address1" placeholder = "Pangitaa Your Local Establishment">
    </div>

    <div id="menu1" class="tab-pane fade">
    <!-- butang dria -->
     <?php include '../function/populate_combobox.php'; ?>
      <br>
      <div class="checkbox pull-right">
          <label>
            <input id="checkbox" type="checkbox" checked="true" onclick="showHideMarker()"> Show all marker for this
          </label>
      </div>
    <input class="form-control" type="text" id="address2" placeholder = "Pangitaa Your Local Establishment">
      <button type="button" class="btn btn-default"  onclick="clickbuttonShowLocationMarker()">
       <span class="glyphicon glyphicon-search"></span> Search
      </button>
    </div>



  </div>
</div>
  <!-- map div container --> 
  <div id="map_canvas"></div> 
</body>  
</html>

