@extends('web.layouts.app')
@section('title', trans('site.Create Subscription'))
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
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
                            {{__('site.People count')}} :
                        </p>
                        <label class="input-style">
                            <input type="number" id="count" name="people_count" min="1" value="1">
                        </label>

                        @if ($errors->has('count'))
                            <div class="alert alert-danger">{{ $errors->first('count') }}</div>
                        @endif
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

                    <div class="row my-3">
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
                            {{__('site.Locale')}}
                        </label>
                        <label>
                            <input class="local-global" id="global" type="radio" name="shipping_type" value="delivery">
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
                            <input type="text" name="billing_address" id="search-input" value="{{ auth()->user()->address }}">
                        </label>
                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                        <input type="hidden" id="lat" name="lat" value="{{ (auth()->user()->lat) ?? '' }}">
                        <input type="hidden" id="lng" name="lng" value="{{ (auth()->user()->lng) ?? '' }}">
                        <p class="name-input">
                            {{__('site.Phone')}}  {{__('site.Optional')}}
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
    @include('partials.google-map', ['lat' => auth()->user()->lat, 'lng' => auth()->user()->lng])

    <script>
        var total = parseFloat($('#total').attr('data-value'));
        var currency = ($('#currency').attr('data-value'));
        $( "#count" ).change(function() {
            var price = parseFloat($('.sub-price').attr('data-value'));
            var count = $('#count').val();
            total = price * count;
            document.getElementById('total').innerHTML = total +' '+ currency;
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#startDate", {
            minDate: "today",
            defaultDate: "today"
        });
    </script>
@endsection
