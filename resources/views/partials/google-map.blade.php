<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ ($setting['google_key']) ?? 0 }}&libraries=places&callback=initMap&language=ar"></script>
<script type="text/javascript">
    /* script */
    lat = {{ ($lat) ?? 28.44249902816536 }};
    lng = {{ ($lng) ?? 36.48057637720706 }};

    function initialize() {
        var latlng = new google.maps.LatLng(lat, lng);
        var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 13
        });
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29)
        });
        var input = document.getElementById('search-input');

        var geocoder = new google.maps.Geocoder();

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();

        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
            infowindow.setContent(place.formatted_address);
            infowindow.open(map, marker);

        });

        // this function will work on marker move event into map
        google.maps.event.addListener(marker, 'dragend', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });

        google.maps.event.addListener(map, 'click', function (event) {
            marker.setPosition(event.latLng);
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });

        });

    }

    function bindDataToForm(address, lat, lng) {
        document.getElementById('search-input').value = address;
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
