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
        $('.local-global').change(function () {
            if($(this).attr('id') === 'global'){
                total += ({{ $setting['delivery_price'] * $subscription->duration_in_day }} ) ?? 0 ;
                document.getElementById('total').innerHTML = total +' '+ currency;
            } else {
                total -= ( {{ $setting['delivery_price'] * $subscription->duration_in_day }} ) ?? 0 ;
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
                        people_count: countVal
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
