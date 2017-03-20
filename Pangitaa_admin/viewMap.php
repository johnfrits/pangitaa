
<!DOCTYPE html>
<html>
  <head>
    <title>View Location</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map_canvas {
        height: 100%;
      }
    </style>

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQNTH-Xpe3QISH-sxMYeOmZGmAPoCyvcA"
            type="text/javascript"></script>
    <script type="text/javascript">
      
  var map;
    function load(id) {
      map = new google.maps.Map(document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(11.816311, 122.621759),
        zoom: 5,
        mapTypeId:google.maps.MapTypeId.HYBRID
      });
      
      downloadUrl("viewMapAjax.php?esh_id="+id+"", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");

        for (var i = 0; i < markers.length; i++) {
  
          var point = new google.maps.LatLng(
               parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));

          var marker = new google.maps.Marker({
            map: map,
            position: point
          });
          
         bindInfoWindow(marker, map)
        }
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


    function bindInfoWindow(marker, map) {
      google.maps.event.addListener(marker, 'click', function() {

        var bounds = new google.maps.LatLngBounds();
        
          var loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
          bounds.extend(loc);
            map.fitBounds(bounds); 
      });
    }

    </script>

  </head>
 

 <?php 


  $esh_id = $_GET["estid"];

  echo '<body onload="load('.$esh_id.')">'
  ?>
    <div id="map_canvas"></div>
  </body>
</html>