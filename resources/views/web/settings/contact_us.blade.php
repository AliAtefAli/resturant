@extends('web.layouts.app')

@section('content')

    <div class="contact-us-info">
        <div class="container">
            <h3>
                {{__('site.Contact us')}}
            </h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="info-contact">
                        <div class="head">
                            <i class="fas fa-map-marker-alt"></i>
                            {{__('site.Address')}}
                        </div>
                        <p class="info">
                            @if(isset($setting['address']))
                                {{ $setting['address'] }}
                            @endif
                        </p>
                        <div class="head">
                            <i class="fas fa-phone-volume"></i>
                            {{__('site.Phone')}}
                        </div>
                        <p class="info">
                            @if(isset($setting['phone']))
                                {{ $setting['phone'] }}
                            @endif
                        </p>
                        <div class="head">
                            <i class="fas fa-envelope"></i>
                            {{__('site.E-mail')}}
                        </div>
                        <p class="info">
                            @if(isset($setting['email']))
                                {{ $setting['email'] }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form action="{{ route('sendMessage') }}" method="post" class="form-pic-select">
            @csrf
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-input">
                        {{__('site.Name')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="name">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </label>
                    <p class="name-input">
                        {{__('site.E-mail')}}
                    </p>
                    <label class="input-style">
                        <input type="email" name="email">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </label>
                    <p class="name-input">
                        {{__('site.Phone')}}
                    </p>
                    <label class="input-style">
                        <input type="tel" name="phone">
                        @if ($errors->has('phone'))
                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </label>
                    <p class="name-input">
                        {{__('site.Message Subject')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="message_subject">
                        @if ($errors->has('message_subject'))
                            <div class="alert alert-danger">{{ $errors->first('message_subject') }}</div>
                        @endif
                    </label>
                    <p class="name-input">
                        {{__('site.Message Content')}}
                    </p>
                    <label class="input-style">
                        <textarea name="message"></textarea>
                        @if ($errors->has('message'))
                            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                        @endif
                    </label>
                    <button class="btn-aaa" type="submit">
                        {{__('site.Send')}}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ ($setting['google_key']) ?? 0 }}&libraries=places&callback=initMap&language=ar"></script>
    <script type="text/javascript">
        /* script */
        lat = {{ ($setting['lat']) ?? 28.44249902816536 }};
        lng = {{ ($setting['lng']) ?? 36.48057637720706 }};

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
@endsection
