<style>
    #map #infowindow-content {
        display: inline;
    }

    #edit_store_map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-container {
        z-index: 9999999;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #searchTextField {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 250px;
    }
    #searchTextField:focus {
        border-color: #4d90fe;
    }

    #edit_store-search {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 250px;
        z-index: 9999999;
    }

    #edit_store-search:focus {
        border-color: #4d90fe;
    }
    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }
    #target {
        width: 250px;
    }

    .mapControls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    #searchTextField {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 50%;
    }
    #searchTextField:focus {
        border-color: #4d90fe;
    }
</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhnmMC23noePz6DA8iEvO9_yNDGGlEaeM&libraries=places&language=ar"></script>
{{--<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ ($setting['google_key']) ?? 0 }}&libraries=places&language=ar"></script>--}}
<script type="text/javascript">
    /* script */


    lat = {{ ($lat) ?? 28.44249902816536 }};
    lng = {{ ($lng) ?? 36.48057637720706 }};


    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert(websiteAllowLocations);
        }
    }
    // show position current and send to mapLocation
    function showPosition(position) {
        document.getElementById('lat').value  = position.coords.latitude;
        document.getElementById('lng').value = position.coords.longitude;
        var geocoder = new google.maps.Geocoder();
        locationMap(position.coords.latitude,position.coords.longitude);
        var latlng = {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)};
        geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
                document.getElementById("search-input").value = results[0].formatted_address;
                document.getElementById("search-input").value = results[0].formatted_address;
            }
        });
    }

    // location map
    function locationMap(latitude,longitude) {
        /* Location details */
        document.getElementById('lat').value  = latitude;
        document.getElementById('lng').value = longitude;

        var myLatLng  = {lat: latitude, lng: longitude};
        var map       = new google.maps.Map(document.getElementById('map'), {
            center    : myLatLng,
            zoom      : 14,
            animation : google.maps.Animation.DROP,
            mapTypeId : google.maps.MapType
        });
        var input  = document.getElementById('search-input');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        var marker     = new google.maps.Marker({
            position   : new google.maps.LatLng( myLatLng.lat, myLatLng.lng),
            map        : map,
            title      : '',
            draggable  : true
        });
        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(true);
            var place = autocomplete.getPlace();
            /* If the place has a geometry, then present it on a map. */
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setIcon(({
                url        : place.icon,
                size       : new google.maps.Size(71, 71),
                origin     : new google.maps.Point(0, 0),
                anchor     : new google.maps.Point(17, 34),
                scaledSize : new google.maps.Size(35, 35)
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

            infowindow.setContent('<div style=""><strong>' + place.name + '</strong><br>' + address);
            //infowindow.open(map, marker);

            var geocoder = new google.maps.Geocoder();
            /* Location details */
            document.getElementById('lat').value  = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();
            geocoder.geocode({'latLng': myLatLng}, function(results, status) {
                if (status === 'OK') {
                    document.getElementById("search-input").value     = results[6].formatted_address;
                    document.getElementById("search-input").value = results[6].formatted_address;

                }
            });
        });

        google.maps.event.addListener(marker, 'dragend', function (event) {
            var geocoder = new google.maps.Geocoder();
            document.getElementById("lat").value  = this.getPosition().lat();
            document.getElementById("lng").value = this.getPosition().lng();
            var myLatLng  = {lat: this.getPosition().lat(), lng: this.getPosition().lng()}

            geocoder.geocode({'latLng': myLatLng}, function(results, status) {
                if (status === 'OK') {
                    document.getElementById("search-input").value     = results[0].formatted_address;
                    document.getElementById("search-input").value = results[0].formatted_address;
                }
            });
        });
    }

    // function initialize() {
    //     var latlng = new google.maps.LatLng(lat, lng);
    //     var map = new google.maps.Map(document.getElementById('map'), {
    //         center: latlng,
    //         zoom: 13
    //     });
    //     var marker = new google.maps.Marker({
    //         map: map,
    //         position: latlng,
    //         draggable: true,
    //         anchorPoint: new google.maps.Point(0, -29)
    //     });
    //     var input = document.getElementById('search-input');
    //
    //     var geocoder = new google.maps.Geocoder();
    //
    //     var autocomplete = new google.maps.places.Autocomplete(input);
    //     autocomplete.bindTo('bounds', map);
    //
    //     var infowindow = new google.maps.InfoWindow();
    //
    //     autocomplete.addListener('place_changed', function () {
    //         infowindow.close();
    //         marker.setVisible(false);
    //         var place = autocomplete.getPlace();
    //         if (!place.geometry) {
    //             window.alert("Autocomplete's returned place contains no geometry");
    //             return;
    //         }
    //
    //         // If the place has a geometry, then present it on a map.
    //         if (place.geometry.viewport) {
    //             map.fitBounds(place.geometry.viewport);
    //         } else {
    //             map.setCenter(place.geometry.location);
    //             map.setZoom(17);
    //         }
    //
    //         marker.setPosition(place.geometry.location);
    //         marker.setVisible(true);
    //
    //         bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
    //         infowindow.setContent(place.formatted_address);
    //         infowindow.open(map, marker);
    //
    //     });
    //
    //     // this function will work on marker move event into map
    //     google.maps.event.addListener(marker, 'dragend', function () {
    //         geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
    //             if (status == google.maps.GeocoderStatus.OK) {
    //                 if (results[0]) {
    //                     bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
    //                     infowindow.setContent(results[0].formatted_address);
    //                     infowindow.open(map, marker);
    //                 }
    //             }
    //         });
    //     });
    //
    //     google.maps.event.addListener(map, 'click', function (event) {
    //         marker.setPosition(event.latLng);
    //         geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
    //             if (status == google.maps.GeocoderStatus.OK) {
    //                 if (results[0]) {
    //                     bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
    //                     infowindow.setContent(results[0].formatted_address);
    //                     infowindow.open(map, marker);
    //                 }
    //             }
    //         });
    //
    //     });
    //
    // }

    function bindDataToForm(address, lat, lng) {
        document.getElementById('search-input').value = address;
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
    }

    google.maps.event.addDomListener(window, 'load',getLocation);
</script>
