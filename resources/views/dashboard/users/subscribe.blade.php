@extends('dashboard.layouts.app')
@section('title', trans('site.Create Subscription'))
@section('content')
    @if(lang() == 'ar')
    <style>
        .pric span{
            color: #FF394F;
        }
        .select-hh label{
            width: 250px;
            text-align: right;
            border-radius: 5px;
            padding: 5px;
            background-color: #1E9FF2 !important;
            color: #fff;
        }
        .noting{
            width: 100%;
            border: 1px solid #ddd;
            height: 160px;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
    @else
        <style>
            .pric span{
                color: #FF394F;
            }
            .select-hh label{
                width: 250px;
                text-align: left;
                border-radius: 5px;
                padding: 5px;
                background-color: #1E9FF2 !important;
                color: #fff;
            }
            .noting{
                width: 100%;
                border: 1px solid #ddd;
                height: 160px;
                padding: 15px;
                border-radius: 5px;
            }
        </style>
    @endif

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1>{{  trans('dashboard.main.Users') }}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a></li>
                            <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.users.index')}}">{{ trans('dashboard.main.Users') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ trans('dashboard.user.edit user') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <!-- form start -->
                            <form class="form-horizontal" method="post"
                                  action="{{route('dashboard.user.storeSubscribe')}}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group row {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="start_date">{{trans('dashboard.discounts.Start Date')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="date" id="startDate" class="pickadate-disable-weekday form-control"
                                                   name="start_date" min="{{Carbon\Carbon::tomorrow()->toDateString()}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'start_date'])
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row {{ $errors->has('count') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="count">{{trans('site.People count')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="number" id="count" class="form-control"
                                                   placeholder="{{trans('site.People count')}}"
                                                   name="people_count" min="1" value="1"/>
                                            @include('dashboard.partials._errors', ['input' => 'count'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('coupon') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="coupon">{{trans('dashboard.discounts.Code')}}</label>
                                    <div class="col-md-7">
                                        <div class="position-relative">
                                            <input class="form-control"
                                                   type="text" name="coupon" id="coupon"
                                                   placeholder="{{ __('dashboard.discounts.Code') }}"/>
                                            @include('dashboard.partials._errors', ['input' => 'coupon'])
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-sm btn-info" id="coupon-submit" style="width:200px;height: 40px;">
                                            <p style="color: #fff !important; margin: 0 !important;" class="text-dark">{{ __('site.Confirm Coupon') }}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group discount-preview offset-2" style="display: none">
                                    <label class="col-md-2"></label>
                                    <div class="position-relative">
                                        <div class="col-md-7">
                                            <span >{{ __('site.Discount amount') }} : </span>
                                            <span id="discount_amount" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-7">
                                            <span >{{ __('site.Total before discount') }} : </span>
                                            <span id="before_discount" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-7">
                                            <span >{{ __('site.Total after discount') }} : </span>
                                            <span id="after_discount" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                        <div class="row">
                                            <div class="pric col">
                                                <p class="name-input">
                                                    {{__('site.Price')}} :
                                                    <span class="sub-price" data-value="{{ $subscription->price }}">{{$subscription->price}}</span>
                                                    <span id="currency" data-value="@if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }}
                                                    @endif">@if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }}
                                                        @endif</span>
                                                </p>
                                            </div>

                                            <input type="hidden" value="{{$subscription->id}}" name="subscribe_id" id="subs_id">
                                            <input type="hidden" value="{{$user->id}}" name="user_id" id="user_id">
                                            <input type="hidden" value="" name="total_billing" id="total_billing">
                                            <input type="hidden" value="" name="ppl_count" id="ppl_count">

                                            <div class="pric col" id="all_total">
                                                <p class="name-input">
                                                    {{__('site.Total')}} :

                                                    <span id="total" class="sub-price" data-value="{{ $subscription->price }}"> {{ $subscription->price }} </span>
                                                    <span id="currency">@if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }}
                                                        @endif</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div style="display: flex;justify-content: space-evenly" class="select-hh">
                                            <label class="">
                                                <input class="local-global local" id="local" type="radio" name="shipping_type" value="local" checked>
                                                <span></span>
                                                {{__('site.receipt_from_our_place_in_alNaeem_neighborhood')}}
                                            </label>
                                            <label class="">
                                                <input class="local-global chekMap" id="global" type="radio" name="shipping_type" value="delivery">
                                                <span></span>
                                                {{ __('site.Delivery') }}
                                                :
                                                {{ $subscription->delivery_price }} @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
                                            </label>
                                            <input type="hidden" id="deliveryPrice" value="{{ $subscription->delivery_price }}">
                                            @if ($errors->has('type'))
                                                <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                                            @endif
                                        </div>
                                        <div class="hide-section" style="display: none" >
                                            <div class="d-flex align-items-center justify-content-between">
                                                <p class="name-input">
                                                    {{__('site.Address')}}
                                                </p>
                                                <label style="width: 90%" class="input-style">
                                                    <input style="width: 100%" class="form-control" type="text" name="billing_address" id="search-input" value="{{ auth()->user()->address }}">
                                                </label>
                                            </div>
                                            <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                            <input type="hidden" id="lat" name="lat" value="{{ (auth()->user()->lat) ?? '' }}">
                                            <input type="hidden" id="lng" name="lng" value="{{ (auth()->user()->lng) ?? '' }}">
                                            <label class="input-style d-flex justify-content-between align-items-center">
                                                <p class="name-input" style="padding-top: 20px">
                                                    {{__('site.Phone')}}  {{__('site.Optional')}} ({{__('site.to_facilitate_the_delivery_process')}})
                                                </p>
                                                <input style="width: 80%" class="form-control" type="text" name="billing_phone" value="{{ old('billing_phone') }}">
                                            </label>
                                        </div>
                                        <p style="margin-bottom: 10px" class="name-input">
                                            {{__('dashboard.order.payment method')}}
                                        </p>
                                        <div class="select-hh">
                                            <label>
                                                <input type="radio" name="payment_type" value="on_delivery" checked>
                                                <span></span>
                                                {{ __('site.On delivery') }}
                                            </label>
                                        </div>
                                        <p class="name-input">
                                            {{__('site.Note')}}
                                        </p>
                                        <textarea class="noting" name="note"></textarea>

                                    </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{__('site.Submit Now')}}
                                    </button>
                                </div>
                            </form>
                            <!-- form end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
@section('scripts')
    <script>

        $(document).ready(function() {
            $("input[name$='shipping_type']").click(function() {
                if($(this).attr('id') == 'global'){
                    $('.hide-section').fadeIn(500);
                } else {
                    $('.hide-section').fadeOut(500);
                }
            });
        });

    </script>
    <script>
        var total = parseFloat($('#total').attr('data-value'));

        var currency = ($('#currency').attr('data-value'));

        $( "#count" ).change(function() {
            var price = parseFloat($('.sub-price').attr('data-value'));
            console.log(price);
            var count = $('#count').val();
            // var delivery = $('#deliveryPrice').val();
            total = price * count;
            document.getElementById('total').innerHTML = total;
        });
        $('.local-global').change(function () {
            if($(this).attr('id') === 'global'){
                total += ({{ $subscription->delivery_price }} ) ?? 0 ;
                document.getElementById('total').innerHTML = total;
            } else {
                total -= ( {{ $subscription->delivery_price }} ) ?? 0 ;
                document.getElementById('total').innerHTML = total;
            }
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
                    // pplCount = $('#ppl_count').val();



                $.ajax({
                    url: "{{ route('dashboard.users.checkCoupon') }}",
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
                            console.log(response.data.people_count);
                            countInput.attr("disabled" ,true);
                            totalBefore.innerText = response.data.totalBefore;
                            totalAfter.innerText = response.data.billing_total;
                            totalBilling.value = response.data.billing_total;
                            $('#ppl_count').val(response.data.people_count);
                            discountAmount.innerText = (response.data.coupon.discount_type === 'percent') ? response.data.coupon.amount + ' %' : response.data.coupon.amount;
                            discountElement.removeAttr('style');
                            toastr.success(response.msg, {timeOut: "50000",});


                        }

                    }
                });
            });
        });
    </script>
    @include('partials.google-map', ['lat' => ($user->lat) ?? 28.44249902816536, 'lng' => ( $user->lat) ?? 36.48057637720706])
@endsection