@extends('web.layouts.app')

@section('content')

    <!--Start User-->

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <div class="img-user">
                <form method="POST" action="{{ route('update.profile', auth()->user()) }}" class="form-pic-select">
                    @csrf
                    @method('PUT')

                    <div class="container">
                        <div class="pic-select pic-select-auth">
                            <p class="name-input">
                                {{__('site.Name')}}
                            </p>
                            <label class="input-style">
                                <input type="text" name="name" value="{{ auth()->user()->name }}">
                            </label>
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                            <p class="name-input">
                                {{__('site.Phone')}}
                            </p>
                            <label class="input-style">
                                <input type="text" name="phone" value="{{ auth()->user()->phone }}">
                                @if ($errors->has('phone'))
                                    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </label>
                            <p class="name-input">
                                {{__('site.E-mail')}}
                            </p>
                            <label class="input-style">
                                <input type="email" name="email" value="{{ auth()->user()->email }}">
                            </label>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif

                            <p class="name-input">
                                {{__('site.Address')}}
                            </p>
                            <label class="input-style">
                                <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}" id="searcInput">
                                <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                <input type="hidden" id="lat" name="lat" value="{{ auth()->user()->lat }}">
                                <input type="hidden" id="lng" name="lng" value="{{ auth()->user()->lng }}">
                            </label>
                            @if ($errors->has('address'))
                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                            @endif


                            <button class="btn-aaa" type="submit">
                                {{__('site.Update')}}
                            </button>
                            <div class="line-between"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--End User-->
    <!--Start Our Meal-->

    <div class="our-meal">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                من وجباتنا
            </h2>
            <div class="owl-carousel owl-theme our-meal-slider">
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
            </div>
        </div>
    </div>

    <!--End Our Meal-->

@endsection
@section('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhnmMC23noePz6DA8iEvO9_yNDGGlEaeM&libraries=places&callback=initMap&language=ar"></script>
    <script type="text/javascript">
        /* script */
        function initialize() {
            var latlng = new google.maps.LatLng({{ auth()->user()->lat }}, {{ auth()->user()->lng }});
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
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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
            document.getElementById('searcInput').value = address;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection

