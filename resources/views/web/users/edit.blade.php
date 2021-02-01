@extends('web.layouts.app')
@section('title', trans('site.Edit'))
@section('content')

    <!--Start User-->

    <div class="user-section">
        @include('web.layouts._sidebar')
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
                                        {{ __('site.Name') }}
                                    </span>
                            <input type="text" readonly>
                        </label>
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        {{ __('site.Phone') }}
                                    </span>
                            <input type="tel" readonly>
                        </label>
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        {{ __('site.E-mail') }}
                                    </span>
                            <input type="email" readonly>
                        </label>

                        <!--<editor-fold desc="address">-->
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        {{ __('site.Address') }}
                                    </span>
                            <input type="text" readonly>
                        </label>
                        <!--</editor-fold>-->
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

                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        {{ __('site.Password') }}
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
    @include('partials.google-map', ['lat' => auth()->user()->lat, 'lng' => auth()->user()->lng])
@endsection
