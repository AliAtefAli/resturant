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
        <form class="form-pic-select" method="post" action="{{ route('subscriptions.store', $subscription) }}">
            @csrf

            <div class="container">
                <div class="pic-select">
                    <p class="name-input">
                        {{__('site.Select Start date for the Subscription')}}
                    </p>
                    <label class="input-style">
                        <input type="date" name="start_date" min="{{\Carbon\Carbon::today()->toDateString()}}">
                        @if ($errors->has('start_date'))
                            <div class="alert alert-danger">{{ $errors->first('start_date') }}</div>
                        @endif
                    </label>

                    <div class="row my-3">
                        <p class="name-input col col-md-2">
                            {{__('site.People count')}} :
                        </p>
                        <label class="input-style">
                            <input type="number" name="count" min="1" value="1">
                        </label>
                        @if ($errors->has('count'))
                            <div class="alert alert-danger">{{ $errors->first('count') }}</div>
                        @endif
                    </div>
                    <div class="select-hh">
                        <label>
                            <input class="local-global" type="radio" name="type" value="local" checked>
                            <span></span>
                            {{__('site.Locale')}}
                        </label>
                        <label>
                            <input class="local-global" type="radio" name="type" value="global">
                            <span></span>
                            {{ __('site.Delivery') }}
                            : @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
                        </label>
                        @if ($errors->has('type'))
                            <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                        @endif
                    </div>
                    <div class="hide-section">
                        <p class="name-input">
                            {{__('site.Address')}}
                        </p>
                        <label class="input-style">
                            <input type="text" name="address" id="search-input" value="{{ auth()->user()->address }}">
                        </label>
                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                        <input type="hidden" id="lat" name="lat" value="{{ (auth()->user()->lat) ?? '' }}">
                        <input type="hidden" id="lng" name="lng" value="{{ (auth()->user()->lng) ?? '' }}">
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
                            <input type="radio" name="payment_method" value="on_delivery" checked>
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
                <input type="hidden" name="count" value="1">
                <button class="btn-aaa" type="submit">
                    {{__('site.Submit Now')}}
                </button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    @include('partials.google-map', ['lat' => auth()->user()->lat, 'lng' => auth()->user()->lng])
@endsection
