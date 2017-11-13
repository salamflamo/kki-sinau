<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 100%;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  #floating-panel {
    position: absolute;
    top: 10px;
    left: 25%;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
    text-align: center;
    font-family: 'Roboto','sans-serif';
    line-height: 30px;
    padding-left: 10px;
  }
</style>
<div id="floating-panel">
  <input class="col-md-6" type="text" id="myPlaceTextBox" placeholder="Cari alamat"  style="height: 7%"/>
  <input onclick="deleteMarkers();" type=button value="Delete Markers">
</div>
<div id="map"></div>
<script>
  var markers = [];
  var labels = "Lokasi ini";
  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -6.999, lng: 110.424},
      zoom: 13,
      mapTypeId: 'roadmap'
    });
    // Create the search box and link it to the UI element.
    var input = document.getElementById('myPlaceTextBox');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });
    google.maps.event.addListener(map, 'click', function(event) {
      setMapOnAll(null);
      markers = [];
      addMarker(event.latLng,map);
    });
    markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();
      if (places.length == 0) {
        return;
      }
      // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];
      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
  }
  // Adds a marker to the map and push to the array.
  function addMarker(location,map) {
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
    markers.push(marker);
  }
  // Sets the map on all markers in the array.
  function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }
  // Deletes all markers in the array by removing references to them.
  function deleteMarkers() {
    setMapOnAll(null);
    markers = [];
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5M6gBYuYAjQG01-A3iO4yKUh9psDOxGo&libraries=places&callback=initAutocomplete"
     async defer></script>
