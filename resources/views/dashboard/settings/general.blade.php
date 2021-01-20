@extends('dashboard.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1>{{  trans('dashboard.main.Settings') }}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.categories.index')}}">{{trans('dashboard.main.Settings')}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.settings.Edit Settings') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        @include('dashboard.partials._all_errors')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <!-- form start -->
                            <form class="form-horizontal" method="post"
                                  action="{{ route('dashboard.settings.update') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="name">{{trans('dashboard.main.email')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="email" class="form-control"
                                                   name="settings[email]"
                                                   value="@if(isset($settings['email'])) {{$settings['email']}} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'email'])
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="phone-mask">{{trans('dashboard.settings.Phone Number')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">+966</span>
                                                </div>
                                                <input type="text" class="form-control phone-inputmask" id="phone-mask"
                                                       placeholder="Enter Phone Number" name="settings[phone]"
                                                       value="@if(isset($settings['phone'])) {{$settings['phone']}} @endif"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="name">{{ trans('dashboard.main.Name In '.$language)}}</label>
                                            <div class="col-md-10">
                                                <div><input type="text" id="name" class="form-control"
                                                            name="settings[{{$key}}_name]"
                                                            value="@if(isset($settings[$key.'_name'])) {{ $settings[$key.'_name'] }} @endif"/>
                                                    @include('dashboard.partials._errors', ['input' => 'name'])
                                                    <div class="form-control-position">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.description">{{ trans('dashboard.settings.Site Description ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="settings[{{$key}}_description]" type="hidden"
                                                       name="settings[{{$key}}_description]"
                                                       value="@if(isset($settings[$key.'_description'])) {{$settings[$key.'_description']}} @endif">
                                                <trix-editor input="settings[{{$key}}_description]"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'description'])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.about">{{ trans('dashboard.settings.Site About ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="settings[{{$key}}_about]" type="hidden"
                                                       name="settings[{{$key}}_about]"
                                                       value="@if(isset($settings[$key.'_about'])) {{$settings[$key.'_about']}} @endif">
                                                <trix-editor input="settings[{{$key}}_about]"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'about'])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('policies') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="settings[{{$key}}_policies]">{{ trans('dashboard.settings.Site Policies ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="settings[{{$key}}_policies]" type="hidden"
                                                       name="settings[{{$key}}_policies]"
                                                       value="@if(isset($settings[$key.'_policies'])) {{$settings[$key.'_policies']}} @endif">
                                                <trix-editor input="settings[{{$key}}_policies]"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'policies'])
                                                <div class="form-control-position"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('rights') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="settings[{{$key}}_rights]">{{ trans('dashboard.settings.Site Rights ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="settings[{{$key}}_rights]" type="hidden"
                                                       name="settings[{{$key}}_rights]"
                                                       value="@if(isset($settings[$key.'_rights'])) {{$settings[$key.'_rights']}} @endif">
                                                <trix-editor input="settings[{{$key}}_rights]"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'rights'])
                                                <div class="form-control-position"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('footer_text') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="settings[{{$key}}_footer_text]">{{ trans('dashboard.settings.Site Footer text ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="settings[{{$key}}_footer_text]" type="hidden"
                                                       name="settings[{{$key}}_footer_text]"
                                                       value="@if(isset($settings[$key.'_footer_text'])) {{$settings[$key.'_footer_text']}} @endif">
                                                <trix-editor input="settings[{{$key}}_footer_text]"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'footer_text'])
                                                <div class="form-control-position"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('currency') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.currency">{{ trans('dashboard.settings.Site Currency ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <div class="position-relative">
                                                    <input type="text" id="currency" class="form-control"
                                                           name="settings[{{$key}}_currency]"
                                                           value="@if(isset($settings[$key.'_currency'])) {{$settings[$key.'_currency']}} @endif"/>
                                                    @include('dashboard.partials._errors', ['input' => 'currency'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-group row {{ $errors->has('logo') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="logo">{{trans('dashboard.settings.Site Logo')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="file" id="logo" class="form-control image img-input"
                                                   name="settings[logo]"/>
                                            @include('dashboard.partials._errors', ['input' => 'settings[logo]'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <img
                                            src="@if(isset($settings['logo']) ){{ asset('assets/uploads/settings/' . $settings['logo']) }} @endif"
                                            alt="Image" class="img-preview" width="150">
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('favicon') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="favicon">{{trans('dashboard.settings.Website Fav Icon')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative ">
                                            <input type="file" id="favicon" class="form-control image img-input"
                                                   name="settings[favicon]"/>
                                            @include('dashboard.partials._errors', ['input' => 'settings[favicon]'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <img
                                            src="@if(isset($settings['favicon']) ){{ asset('assets/uploads/settings/' . $settings['favicon']) }} @endif"
                                            alt="Image" class="img-preview" width="50">
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('menu_of_the_week') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="menu_of_the_week">{{trans('dashboard.settings.Menu of the week')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative ">
                                            <input type="file" id="menu_of_the_week" class="form-control image img-input"
                                                   name="settings[menu_of_the_week]"/>
                                            @include('dashboard.partials._errors', ['input' => 'settings[menu_of_the_week]'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <img
                                            src="@if(isset($settings['menu_of_the_week']) ){{ asset('assets/uploads/settings/' . $settings['menu_of_the_week']) }} @endif"
                                            alt="Image" class="img-preview" width="150">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2">{{ __('dashboard.settings.Company Location') }}</div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="settings[address]"
                                               value="@if(isset($settings['address'])){{ $settings['address'] }}@endif"
                                               id="search-input">
                                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                        <input type="hidden" id="lat" name="settings[lat]"
                                               value="@if( isset($settings['lat'])){{ $settings['lat'] }}@endif">
                                        <input type="hidden" id="lng" name="settings[lng]"
                                               value="@if( isset($settings['lng']) ){{ $settings['lng'] }}@endif">
                                        @if ($errors->has('address'))
                                            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('delivery_price') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="delivery_price">{{trans('dashboard.settings.Delivery price')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="float" id="delivery_price" class="form-control"
                                                   name="settings[delivery_price]"
                                                   value="@if(isset($settings['delivery_price'])) {{  $settings['delivery_price'] }} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'delivery_price'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.settings.Update Settings')}}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
    <script
        src="{{ asset('dashboard_files/app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/extended/form-inputmask.min.js') }}"></script>
{{--    <script src="{{ asset('dashboard_files/assets/js/image-review.js') }}"></script>--}}
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
