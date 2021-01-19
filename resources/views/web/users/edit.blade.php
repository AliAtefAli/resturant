@extends('web.layouts.app')

@section('content')

    <!--Start User-->

    <div class="user-section">
        <div class="nav-side-page">
                    <span class="open-nav-side-page">
                        <i class="fas fa-caret-left"></i>
                    </span>
            <span class="top-head-side"></span>
            <img class="logo" src="{{asset('web_files/images/logo.png')}}">
            <ul class="list-unstyled">
                <li class="active">
                    <a href="#">
                        <i class="fas fa-user"></i>
                        البيانات الشخصية
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-bread-slice"></i>
                        الباقات
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-utensils"></i>
                        المنيو الاسبوعى
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-box"></i>
                        الطلبات
                    </a>
                </li>
            </ul>
        </div>
        <div class="user-info">
            <div class="img-user">
                <form>
                    <div class="imgg">
                        <i class="fas fa-pencil-alt"></i>
                        <input id="img-user" type="file">
                        <img src="{{asset('web_files/images/healthy-food-bowl.jpg')}}">
                    </div>
                    <div class="form-user">
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        الاسم
                                    </span>
                            <input type="text" readonly>
                        </label>
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        رقم الجوال
                                    </span>
                            <input type="tel" readonly>
                        </label>
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        البريد الالكترونى
                                    </span>
                            <input type="email" readonly>
                        </label>

                        <!--<editor-fold desc="address">-->
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        العنوان
                                    </span>
                            <input type="text" readonly>
                        </label>
                        <!--</editor-fold>-->
                        <p class="name-input">
                            {{__('site.Address')}}
                        </p>
                        <label class="input-style">
                            <input type="text" class="form-control" name="address"
                                   value="{{ auth()->user()->address }}" id="search-input">
                            <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                            <input type="hidden" id="lat" name="lat" value="{{ auth()->user()->lat }}">
                            <input type="hidden" id="lng" name="lng" value="{{ auth()->user()->lng }}">
                        </label>
                        @if ($errors->has('address'))
                            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                        @endif

                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        كلمة المرور
                                    </span>
                            <input type="password" readonly>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--End User-->

@endsection
@section('scripts')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ ($setting['google_key']) ?? 0 }}&libraries=places&callback=initMap&language=ar"></script>
    <script type="text/javascript">
        /* script */
        lat = {{ auth()->user()->lat }};
        lng = {{ auth()->user()->lng }};
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

        function bindDataToForm(address,lat,lng){
            document.getElementById('search-input').value = address;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
