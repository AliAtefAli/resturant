@extends('web.layouts.app')

@section('content')

    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form method="POST" action="{{ route('register') }}" class="form-pic-select">
            @csrf
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-page">
                        {{__('site.Register')}}
                    </p>
                    <p class="name-input">
                        {{__('site.Name')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="name" value="{{ old('name') }}">
                    </label>
                    @if ($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                    <p class="name-input">
                        {{__('site.Phone')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </label>
                    <p class="name-input">
                        {{__('site.E-mail')}}
                    </p>
                    <label class="input-style">
                        <input type="email" name="email" value="{{ old('email') }}">
                    </label>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif

                    <p class="name-input">
                        {{__('site.Address')}}
                    </p>
                    <label class="input-style">
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="search-input">
                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                        <input type="hidden" id="lat" name="lat" value="{{ old('lat') }}">
                        <input type="hidden" id="lng" name="lng" value="{{ old('lng') }}">
                    </label>
                    @if ($errors->has('address'))
                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                    @endif

                    <p class="name-input">
                        {{__('site.Password')}}
                    </p>
                    <label class="input-style">
                        <input type="password" name="password">
                    </label>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif

                    <p class="name-input">
                        {{__('site.Password confirmation')}}
                    </p>
                    <label class="input-style">
                        <input type="password" name="password_confirmation">
                    </label>
                    @if ($errors->has('password_confirmation'))
                        <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                    @endif

                    <div class="">
                        <a href="#" class="link-forget">
                            {{__('site.Policies')}}
                        </a>
                    </div>
                    <button class="btn-aaa" type="submit">
                        {{__('site.Register')}}
                    </button>
                    <div class="line-between"></div>
                </div>
            </div>
        </form>
        <a href="{{route('login')}}" class="btn-aaa" type="submit">
            {{__('site.Login')}}
        </a>
    </div>
@endsection
@section('scripts')
    <script  async defer src="https://maps.googleapis.com/maps/api/js?key={{ ($setting['google_key']) ?? 0 }}&libraries=places&callback=initMap&language=ar"></script>
    <script type="text/javascript">
        /* script */
        function initialize() {
            var latlng = new google.maps.LatLng(24.7136, 46.6753);
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
            document.getElementById('searcInput').value = address;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection
