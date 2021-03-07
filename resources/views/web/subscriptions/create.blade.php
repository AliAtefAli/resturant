@extends('web.layouts.app')
@section('title', trans('site.Create Subscription'))
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

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
    #search-input
    {
        width: 70%;
        height: 13%;
        font-size: 20px;
    }
</style>

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
        <form class="form-pic-select" method="post" action="{{ route('subscriptions.checkPayment', $subscription) }}">
            @csrf


            <div class="container">
                <div class="pic-select">
                    <p class="name-input">
                        {{__('site.Select Start date for the Subscription')}}
                    </p>
                    <label class="input-style">
                        <input id="startDate" type="date" name="start_date" >
                        @if ($errors->has('start_date'))
                            <div class="alert alert-danger">{{ $errors->first('start_date') }}</div>
                        @endif
                    </label>

                    <div class="row my-3">
                        <p class="name-input col col-md-2">
                            {{__('site.People count')}}
                        </p>
                        <label class="input-style">
                            <input type="number" id="count" name="people_count" min="1" value="1" >
                        </label>

                        @if ($errors->has('count'))
                            <div class="alert alert-danger">{{ $errors->first('count') }}</div>
                        @endif
                    </div>

                    <div class="row my-3">
                        <div class="pic-select pic-select-auth pic-select-auth-any row">
                            <div class="col-md-9" style="max-width: 75%">
                                <p class="name-input">
                                    {{ __('site.Do you have Coupon') }}
                                </p>

                                <label class="input-style">
                                    <input type="text" name="coupon" id="coupon"
                                           placeholder="{{ __('dashboard.discounts.Code') }}">
                                </label>
                                @if ($errors->has('coupon'))
                                     <div class="alert alert-danger">{{ $errors->first('coupon') }}</div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-sm custom-button" id="coupon-submit" style="width:200px;height: 46px;">
                                    {{ __('site.Confirm Coupon') }}
                                </a>
                            </div>
                            <div class="discount-preview" style="display: none">
                                <div class="ml-3">
                                    <span>{{ __('site.Discount amount') }} : </span>
                                    <span id="discount_amount" class="text-danger"></span>
                                </div>
                                <div class="ml-3">
                                    <span>{{ __('site.Total before discount') }} : </span>
                                    <span id="before_discount" class="text-danger"></span>
                                </div>
                                <div class="ml-3">
                                    <span>{{ __('site.Total after discount') }} : </span>
                                    <span id="after_discount" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <p class="name-input col col-md-3">
                            {{__('site.Price')}} : <span class="sub-price mr-1" data-value="{{ $subscription->price }}">{{ $subscription->price }}  </span>

                            <span id="currency"
                                  data-value="@if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }}
                                  @endif">
                             @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }}
                                @endif
                         </span>
                        </p>
                    </div>

                    <input type="hidden" value="{{$subscription->id}}" name="subs_id" id="subs_id">
                    <input type="hidden" value="" name="total_billing" id="total_billing">
                    <div class="row my-3" id="all_total">
                        <p class="name-input col col-md-3">
                            {{__('site.Total')}} :

                            <span id="total" class="sub-price mr-1"
                                  data-value="{{ $subscription->price }}"> {{ $subscription->price }}  @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }}
                                @endif </span>
                        </p>
                    </div>
                    <div class="select-hh">
                        <label>
                            <input class="local-global" id="local" type="radio" name="shipping_type" value="local" checked>
                            <span></span>
                            {{__('site.receipt_from_our_place_in_alNaeem_neighborhood')}}
                        </label>
                        <label>
                            <input class="local-global" id="global" type="radio" name="shipping_type" value="delivery">
                            <span></span>
                            {{ __('site.Delivery') }}
                            : {{ $subscription->delivery_price }} @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
{{--                            @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] * $subscription->duration_in_day }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif--}}
                        </label>
                        <input type="hidden" id="deliveryPrice" value="{{ $subscription->delivery_price }}">
                        @if ($errors->has('type'))
                            <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                        @endif
                    </div>
                    <div class="hide-section">
                        <p class="name-input">
                            {{__('site.Address')}}
                        </p>
                        <label class="input-style">
                            <input type="text" name="billing_address" id="search-input" value="{{ old('address') }}">
                        </label>
                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                        <input type="hidden" id="lat" name="lat" value="{{ old('lat') }}">
                        <input type="hidden" id="lng" name="lng" value="{{ old('lng') }}">
                        <p class="name-input" style="padding-top: 20px">
                            {{__('site.Phone')}}  {{__('site.Optional')}} ({{__('site.to_facilitate_the_delivery_process')}})
                        </p>
                        <label class="input-style">
                            <input type="text" name="billing_phone" value="{{ old('billing_phone') }}">
                        </label>
                    </div>
                    <p class="name-input">
                        {{__('dashboard.order.payment method')}}
                    </p>
                    <div class="select-hh">
                        <label>
                            <input type="radio" name="payment_type" value="credit_card">
                            <span></span>
                            {{__('site.Credit Card')}}
                        </label>
                        <label>
                            <input type="radio" name="payment_type" value="on_delivery" checked>
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
                <button class="btn-aaa" type="submit">
                    {{__('site.Submit Now')}}
                </button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ ($setting['google_key']) ?? 0 }}&libraries=places&language=ar"></script>
    <script type="text/javascript">
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

        function bindDataToForm(address, lat, lng) {
            document.getElementById('search-input').value = address;
            document.getElementById('lat').value = lat;
            document.getElementById('lng').value = lng;
        }

        google.maps.event.addDomListener(window, 'load',getLocation);
    </script>

    <script>
        var total = parseFloat($('#total').attr('data-value'));
        var currency = ($('#currency').attr('data-value'));
        $( "#count" ).change(function() {
            var price = parseFloat($('.sub-price').attr('data-value'));
            var count = $('#count').val();
            // var delivery = $('#deliveryPrice').val();
            total = price * count;
            document.getElementById('total').innerHTML = total +' '+ currency;
        });
        $('.local-global').change(function () {
            if($(this).attr('id') === 'global'){
                total += ({{ $subscription->delivery_price }} ) ?? 0 ;
                document.getElementById('total').innerHTML = total +' '+ currency;
            } else {
                total -= ( {{ $subscription->delivery_price }} ) ?? 0 ;
                document.getElementById('total').innerHTML = total +' '+ currency;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>


        flatpickr("#startDate", {
            minDate: new Date().fp_incr(1),
            defaultDate: new Date().fp_incr(1),
            // locale: {
            //     'firstDayOfWeek': 0 // start week on Monday
            // },

            disable: [
                function(date) {
                    // return true to disable
                    return (date.getDay() === 5 || date.getDay() === 6);
                }
            ]
            // daysOfWeekDisabled: [0, 6]
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#coupon-submit').click(function (e) {
                e.preventDefault();
                var coupon = $('#coupon').val(),
                    discountElement = $('.discount-preview'),
                    totalBefore = document.getElementById('before_discount'),
                    totalAfter = document.getElementById('after_discount'),
                    discountAmount = document.getElementById('discount_amount'),
                    totalBilling = document.getElementById('total_billing'),
                    shippingType = document.querySelector('.local-global:checked').value,
                    countVal = $('#count').val();
                    subsId = $('#subs_id').val();
                    countInput = $('#count');


                $.ajax({
                    url: "{{ route('subscriptions.checkCoupon') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        coupon: coupon,
                        subscription: subsId,
                        people_count: countVal,
                        shipping_type: shippingType,
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === false) {
                            toastr.error(response.msg, {timeOut: "50000",})
                        } else {
                            countInput.attr("disabled" ,true);
                            totalBefore.innerText = response.data.totalBefore;
                            totalAfter.innerText = response.data.billing_total;
                            totalBilling.value = response.data.billing_total;
                            discountAmount.innerText = (response.data.coupon.discount_type === 'percent') ? response.data.coupon.amount + ' %' : response.data.coupon.amount;
                            discountElement.removeAttr('style');
                            toastr.success(response.msg, {timeOut: "50000",});


                        }

                    }
                });
            });
        });
    </script>
@endsection
