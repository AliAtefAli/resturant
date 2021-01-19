@extends('web.layouts.app')

@section('content')

    <div class="header-pic">
        <div class="container">
            <div class="img"
                 style="background-image: url('{{asset('assets/uploads/subscriptions/' . $subscription->image)}}')">
                <div class="overlay"></div>
                <h3>{{ $subscription->name }}</h3>
            </div>
        </div>
    </div>
    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form class="form-pic-select" method="post" action="{{ route('subscriptions.store') }}">
            @csrf
            <div class="container">
                <div class="pic-select">
                    <p class="name-input">
                        {{__('site.Select Start date for the Subscription')}}
                    </p>
                    <label class="input-style">
                        <input type="date" name="start_date" min="{{\Carbon\Carbon::today()->toDateString()}}">
                        {{--                        <i class="far fa-calendar-alt"></i>--}}
                    </label>
                    <div class="select-hh">
                        <label>
                            <input class="local-global" type="radio" name="type" value="local">
                            <span></span>
                            {{__('site.Locale')}}
                        </label>
                        <label>
                            <input class="local-global" type="radio" name="type" value="global">
                            <span></span>
                            {{ __('site.Delivery') }}
                            : @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
                        </label>
                    </div>
                    <div class="hide-section">
                        <p class="name-input">
                            {{__('site.Address')}}
                        </p>
                        <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                        <input type="hidden" id="lat" name="lat" value="">
                        <input type="hidden" id="lng" name="lng" value="">
                        <label class="input-style">
                            <br>
                            <input type="text" name="address" id="address" value="{{old('address')}}">
                            <i class="fas fa-map-marker-alt"></i>
                        </label>
                        <p class="name-input">
                            {{__('site.Phone')}}  {{__('site.Optional')}}
                        </p>
                        <label class="input-style">
                            <input type="text" name="phone_number" value="{{ old('phone_number') }}">
                        </label>
                    </div>
                    <p class="name-input">
                        {{__('dashboard.order.payment method')}}
                    </p>
                    <div class="select-hh">
                        <label>
                            <input type="radio" name="payment_method" value="credit_card">
                            <span></span>
                            {{__('site.Credit Card')}}
                        </label>
                        <label>
                            <input type="radio" name="payment_method" value="on_delivery">
                            <span></span>
                            {{ __('site.On delivery') }}
                        </label>
                    </div>
                    <p class="name-input">
                        {{__('site.Note')}}
                    </p>
                    <textarea name="note"></textarea>
                </div>
                <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
                <input type="hidden" name="count" value="{{$count}}">
                <input type="hidden" name="user_id" value="1">
                <button class="btn-aaa" type="submit">
                    {{__('site.Submit Now')}}
                </button>
            </div>
        </form>
    </div>

    {{--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>--}}
    {{--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhnmMC23noePz6DA8iEvO9_yNDGGlEaeM&libraries=places&callback=initMap&language=ar"></script>--}}
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhnmMC23noePz6DA8iEvO9_yNDGGlEaeM&sensor=false&libraries=places&language=ar"></script>
    {{--    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuYY84a2JsQMGn0flnFBcgSU7ufqkBULU&libraries=places&callback=initMap&language=ar"></script>--}}
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
            var input = document.getElementById('searchInput');
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

        function bindDataToForm(address, lat, lng) {
            document.getElementById('address').value = address;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

@endsection
