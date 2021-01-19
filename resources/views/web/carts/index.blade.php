@extends('web.layouts.app')

@section('content')

    @if(Cart::count() > 0)
        <div class="tabal-cart">
            <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
            <div class="container">
                <div class="small-container table-responsive">
                    <table>
                        <thead>
                        <tr>
                            <th></th>
                            <th>
                                <span>{{ __('site.Quantity') }}</span>
                            </th>
                            <th>
                                <span></span>{{__('site.Image')}}</span>
                            </th>
                            <th>
                                <span>{{__('site.Name')}}</span>
                            </th>
                            <th>
                                <span></span>{{__('site.Price')}}</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::content() as $cart)
                            <tr>
                                <td class="remove-product">
                                    <a href="{{ route('cart.remove', $cart->rowId) }}" class="text-danger">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                                <td class="product-price">
                                    <div class="number-of-product-section">
                                        <div class="container-form">
                                            <span class="plus">+</span>
                                            <input type="text" name="qty" class="qty" value="{{$cart->qty }}">
                                            <span class="munas">-</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-img">
                                    <div>
                                        <div class="img">
                                            <img src="{{asset('assets/uploads/products/' . $cart->options->image)}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <h3>
                                        {{ $cart->name }}
                                    </h3>
                                </td>
                                <td class="product-price">
                                    <h3>
                                        {{ $cart->price }}
                                        @if(isset($setting[app()->getLocale() . '_currency']))
                                            {{ $setting[app()->getLocale() . '_currency'] }}
                                        @endif
                                    </h3>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--End tabal cart-->
        <!--Start Line-->

        <div class="line-section line-section1">
            <div class="container">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <!--End Line-->
        <div class="info-pro-cart-section">
            <div class="container">
                <div class="info-pro-cart">
                    <div>
                        <div>
                            <span>
                                {{ __('dashboard.settings.Delivery price') }}
                            </span>
                        </div>
                        <div>
                            <span>
                                @if(isset($setting['delivery_price']))
                                    {{ $setting['delivery_price'] }}
                                @endif
                                @if(isset($setting[app()->getLocale() . '_currency']))
                                    {{ $setting[app()->getLocale() . '_currency'] }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div>
                        <div>
                            <span>
                                {{__('site.Total')}}
                            </span>
                        </div>
                        <div>
                            <span>
                                {{Cart::total()}}
                                @if(isset($setting[app()->getLocale() . '_currency']))
                                    {{ $setting[app()->getLocale() . '_currency'] }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <p class="cape-shop">
                    هل تود إتمام الشراء؟
                </p>
            </div>
        </div>
        <div class="last-part small-container">
            <div class="container">
                <p>
                    هل لديك كوبون خصم؟
                </p>
                <form class="offer">
                    <input type="text" placeholder="كوبون الخصم">
                    <button type="submit">
                        تفعيل
                    </button>
                </form>
                <form action="{{ route('order.store') }}" method="post" class="finsh-requet">
                    @csrf
                    <p>
                        {{ __('site.Order.payment method') }}
                    </p>
                    <div>
                        <label>
                            <input type="radio" name="payment_method" value="payment">
                            <span></span>
                            {{ __('site.Credit Card') }}
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="payment_method" value="on_delivery" checked>
                            <span></span>
                            {{ __('site.On delivery') }}
                        </label>
                    </div>

                    <div class="pic-select pic-select-auth pic-select-auth-any">
                        <p class="name-input">
                            {{__('site.Name')}}
                        </p>
                        <label class="input-style">
                            <input type="text" name="billing_name" value="@if(auth()->check()) {{ auth()->user()->name }} @endif">
                        </label>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                        <p class="name-input">
                            {{__('site.Phone')}}
                        </p>
                        <label class="input-style">
                            <input type="text" name="billing_phone" value="@if(auth()->check()){{ auth()->user()->phone }}@endif">
                            @if ($errors->has('phone'))
                                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </label>
                        <p class="name-input">
                            {{__('site.E-mail')}}
                        </p>
                        <label class="input-style">
                            <input type="email" name="billing_email" value="@if(auth()->check()){{ auth()->user()->email }}@endif">
                        </label>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif

                        <p class="name-input">
                            {{__('site.Address')}}
                        </p>
                        <label class="input-style">
                            <input type="text" class="form-control" name="billing_address"
                                   value="@if(auth()->check()){{ auth()->user()->address }}@endif" id="search-input">
                            <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                            <input type="hidden" id="lat" name="lat" value="@if(auth()->check()){{ auth()->user()->lat }}@endif">
                            <input type="hidden" id="lng" name="lng" value="@if(auth()->check()){{ auth()->user()->lng }}@endif">
                        </label>
                        @if ($errors->has('address'))
                            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                        @endif


                    </div>
                    <button type="submit">
                        {{ __('site.Order.Confirm Order') }}
                    </button>
                </form>
            </div>
        </div>
    @else
        @include('web.layouts.our-meals')
    @endif
@endsection
@section('scripts')
    <script>
        $('.container-form .munas').click(function () {
            tr = $(this).parents('tr');
            inputValue = tr.find('.qty').val();
            // console.log(inputValue);
            var elementInput = $(this).parents('tr').find('.qty'),
                inputValue = tr.find('.qty').val();
            inputValue--;
            if (inputValue <= 0) {
                inputValue = 1;
            }
            elementInput.val(inputValue);
        });

        $('.container-form .plus').click(function () {
            tr = $(this).parents('tr'),
                elementInput = tr.find('.qty'),
                inputValue = tr.find('.qty').val();
            inputValue++;
            elementInput.val(inputValue);
        });

        $('.container-form input').change(function () {

        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ ($setting['google_key']) ?? 0 }}&libraries=places&callback=initMap&language=ar"></script>
    <script type="text/javascript">
        /* script */
        lat = {{ (auth()->user()->lat) ?? 28.44249902816536 }};
        lng = {{ (auth()->user()->lng) ?? 36.48057637720706 }};
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
