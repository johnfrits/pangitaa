<!DOCTYPE html> 
<html> 
<head> 
  <link href="../resources/CSS/addEstablishmentMap.css" rel="stylesheet"/>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
  <style type="text/css">
   #lat{
    color: black;
   }
   #long{
    color: black;
    margin-top: -10px;
   }
  </style>
  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
  <script src="../resources/JS/add_establishment_validate_form.js"></script>
  <script type="text/javascript">    
    //declare namespace
    var up206b = {};
    var up207b = {};
 
    //declare map 
    var map;

    function trace(message) 
    {
      if (typeof console != 'undefined') 
      {
        console.log(message);
      }
    }
 
    up206b.initialize = function()
    {
      var latlng = new google.maps.LatLng(11.816311,122.621754);
      var myOptions = {
        zoom: 6,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.HYBRID
      };

      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

      AddLatLongToMarker(map);
    }

    function AddLatLongToMarker(mapLocation){
      
      var contentString;
      // declare this effin marker
      var marker = new google.maps.Marker({
        position: mapLocation.getCenter(),
        draggable: true,
        animation: google.maps.Animation.DROP,
        label: "P",
        map: map
     
      });
      // end

      //*the infow window of marker bruh*//  
      var infowindow = new google.maps.InfoWindow({
      content: contentString
      });

      marker.addListener('click', function() {
      infowindow.setContent('<p id="lat"  >Latitude&nbsp;&nbsp;&nbsp;:  ' + mapLocation.getCenter().lat().toFixed(6) + '</p><p id="long"> Longitude: ' + mapLocation.getCenter().lng().toFixed(6) + '</p>');        
      infowindow.open(mapLocation, marker);
      document.getElementById("map-output").innerHTML = '<input type="text" name="lat" value="'+map.getCenter().lat().toFixed(6)+'"/> <input type="text" name="lng" value="'+map.getCenter().lng().toFixed(6)+'"/> ';
      });
      //*the infow window of marker bruh*//

      // intercept map and marker movements
      google.maps.event.addListener(mapLocation, "idle", function() {
      infowindow.setContent('<p id="lat"  >Latitude&nbsp;&nbsp;&nbsp;: ' + mapLocation.getCenter().lat().toFixed(6) + '</p><p id="long"> Longitude: ' + mapLocation.getCenter().lng().toFixed(6) + '</p>');     
      marker.setPosition(mapLocation.getCenter());
     document.getElementById("map-output").innerHTML = '<input type="text" name="lat" value="'+map.getCenter().lat().toFixed(6)+'"/> <input type="text" name="lng" value="'+map.getCenter().lng().toFixed(6)+'"/> ';
      });

      //mao ni fucntion para pag drag mu set to center ang map
      google.maps.event.addListener(marker, "dragend", function(mapEvent) {
      infowindow.setContent('<p id="lat"  >Latitude&nbsp;&nbsp;&nbsp;: ' + mapLocation.getCenter().lat().toFixed(6) +'</p><p id="long"> Longitude: ' + mapLocation.getCenter().lng().toFixed(6) + '</p>');     
      mapLocation.panTo(mapEvent.latLng);
      document.getElementById("map-output").innerHTML = '<input type="text" name="lat" value="'+map.getCenter().lat().toFixed(6)+'"/> <input type="text" name="lng" value="'+map.getCenter().lng().toFixed(6)+'"/> ';
      }); 
    }

</script>

<script>

    var placeSearch, autocomplete;
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
    };

    function initAutocomplete() {
      // Create the autocomplete object, restricting the search to geographical
      // location types.
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
          {types: ['geocode']});

      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();

      for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
      }

      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById(addressType).value = val;
        }
      }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });
          autocomplete.setBounds(circle.getBounds());
        });
      }
    }

</script>


</head>

<body onload="up206b.initialize()"> 
  <!-- side panel div container --> 
<div class="side-panel">
  
  <?php 
      echo '<form action="../function/add_establishment.php?userID='.$_SESSION['userID'].'" method="POST" enctype="multipart/form-data"> ';
  ?>
  <h4> Add a Establishment</h4>
  <hr style="margin-top: -2px;">
  <div id="map-output" style="display: none;" ></div>
  <div class="form-group">
    <label class="control-label" for="focusedInput">Establishment name*</label>
    <input class="field form-control" type="text" id="est_name" placeholder="Provide valid establishment name" name="esh_name" onchange="ValidateAddEstablishmentForm();">
  </div>
  &nbsp;
  <div class="form-group" id="locationField">
      <label class="control-label" for="focusedInput">Enter your address*</label>
      <input class="field form-control" id="autocomplete" onFocus="geolocate()" type="text">
  </div>  
  &nbsp;
  <div class="form-group">
    <label class="control-label" for="focusedInput">Street address*</label>
    <input class="field form-control" id="street_number" disabled="true" type="text" name="street_add" onchange="ValidateAddEstablishmentForm();">
  </div>
  &nbsp;
  <div class="form-group">
    <label class="control-label" for="focusedInput">Route</label>
    <input class="field form-control" id="route" disabled="true" type="text" name="route"> 
  </div>
    &nbsp;
  <div class="form-group">
    <label class="control-label" for="focusedInput">City*</label>
    <input class="field form-control" id="locality" disabled="true" type="text" name="city" onchange="ValidateAddEstablishmentForm();" > 
  </div>
    &nbsp;
  <table style="height: 20px; border-collapse: separate; border-spacing: 2px">
  <tr>
      <td><label class="control-label" >Region / State</label></td>
      <td><label class="control-label" >Postal code / Zip code</label></td>
  </tr>
  <tr>
      <td style="width: 50%;"><input class="field form-control" id="administrative_area_level_1" disabled="true" type="text" name="region"></td>
      <td style="width: 50%;"><input class="field form-control" id="postal_code" disabled="true" type="text" name="zip_code"></td>
  </tr>
  </table>
  &nbsp;
  <div class="form-group">
    <label class="control-label" for="focusedInput">Country*</label>
    <?php include_once 'country.php'; ?>
  </div>
  &nbsp;
  <div class="form-group">
    <label class="control-label" for="focusedInput">Business Phone*</label>
    <input class="field form-control" id="bphone" placeholder="263-204-110" type="text" name="business_phone" onchange="ValidateAddEstablishmentForm();">
  </div>  
  &nbsp;
  <div class="form-group">
    <label class="control-label" for="focusedInput">Email Address</label>
    <input class="field form-control" id="emailadd" placeholder="your.email@yahoo.com" type="email" name="email_add" onchange="ValidateAddEstablishmentForm();">
  </div>  
  &nbsp;
  <div class="form-group">
    <label class="control-label" for="focusedInput">Category*</label>
    <input class="field form-control" id="category" placeholder="E.g: Mechanical and Welding Shop" type="text" name="category" onchange="ValidateAddEstablishmentForm();">
  </div>  
  &nbsp;
  <div class="form-group">
    <div class="text-center">
      <input type="file" class="text-center" onchange="readURL(this);" name="image" id="file">
    </div>
  </div>

  &nbsp;
  <input class="btn btn-primary pull-right" value="Add Establishment" id="add_est" type="submit" name="add" style="margin-left: 10px;" onclick="ValidateAddEstablishmentForm();">
  <input class="btn btn-default pull-right" value="Cancel" type="submit" onclick="window.location.reload();return false;">
</form>
</div>

  <!-- map div container --> 
<div id="map_canvas"></div> 


</body>  
</html>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQNTH-Xpe3QISH-sxMYeOmZGmAPoCyvcA&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>