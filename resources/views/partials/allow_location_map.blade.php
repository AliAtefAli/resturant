<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ ($setting['google_key']) ?? 0 }}&libraries=places&language=ar"></script>
<script type="text/javascript">

    $(document).ready(function(){
        setTimeout(function () {
            initMap(21.452190359158408,39.20488498374456);
            getLocation();
        },2000)
    });

    function initMap(lat,lng){
        var latlng    = new google.maps.LatLng(lat, lng);
        var map       = new google.maps.Map(document.getElementById('map'), {
            center    : latlng,
            zoom      : 11,
            animation : google.maps.Animation.DROP,
            mapTypeId : google.maps.MapType
        });
        var input  = document.getElementById('search-input');
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        var marker     = new google.maps.Marker({
            position   : new google.maps.LatLng( lat, lng),
            map        : map,
            title      : 'الاحداثيات',
            draggable  : true
            //anchorPoint: new google.maps.Point(0, 0)
        });
        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(true);
            var place = autocomplete.getPlace();
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(11);
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
            /* Location details */
            document.getElementById('search-input').value   = place.formatted_address;
            document.getElementById('lat').value  = place.geometry.location.lat();
            document.getElementById('lng').value = place.geometry.location.lng();
        });
        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(marker, 'dragend', function (event) {
            document.getElementById("lat").value   = this.getPosition().lat();
            document.getElementById("lng").value  = this.getPosition().lng();
            geocoder.geocode({'latLng': latlng}, function(results, status) {
                if (status === 'OK') {
                    document.getElementById("search-input").value  = results[1].formatted_address;
                }
            });
        });
    }
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("يرجى تفعيل اللوكيشن")
        }
    }
    function showPosition(position) {
        initMap(position.coords.latitude,position.coords.longitude);
        var geocoder = new google.maps.Geocoder;
        document.getElementById("lat").value   = position.coords.latitude;
        document.getElementById("lng").value  = position.coords.longitude;
        var latlng = {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)};
        geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
                document.getElementById("search-input").value  = results[1].formatted_address;
            }
        });
    }
</script>