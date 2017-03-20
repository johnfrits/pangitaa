

  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQNTH-Xpe3QISH-sxMYeOmZGmAPoCyvcA"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

    var map;
    function load() {
      map = new google.maps.Map(document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(11.816311, 122.621759),
        zoom: 5,
        mapTypeId:google.maps.MapTypeId.HYBRID
      });

      var infoWindow = new google.maps.InfoWindow;
      
      downloadUrl("../gmap/markerajaxsql.php", function(data) {
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

  function clickbuttonShowLocationMarker(id){

         var bounds = new google.maps.LatLngBounds();
      
        downloadUrl("../gmap/markerEstablishment.php?esh_id="+id+"", function(data) {
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
          var loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
          bounds.extend(loc);
          map.panTo(marker.getPosition());
          map.fitBounds(bounds); 
          bindInfoWindow(marker, map);
        }
      });
  }

    function bindInfoWindow(marker, map) {
      google.maps.event.addListener(marker, 'click', function() {

        var bounds = new google.maps.LatLngBounds();
        
          var loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
          bounds.extend(loc);
            map.fitBounds(bounds); 
      });
    }

    // function bindInfoWindow(marker, map, infoWindow, html) {
    //   google.maps.event.addListener(marker, 'click', function() {
    //     infoWindow.setContent(html);
    //     infoWindow.open(map, marker);
    //   });
    // }

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
    <div id="map_canvas"></div>
  </body>

</html>