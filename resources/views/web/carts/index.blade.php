@extends('web.layouts.app')
@section('title', trans('site.Cart'))
@section('content')

    @if(Cart::instance('cart')->count() > 0)
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
                        @foreach(Cart::instance('cart')->content() as $cart)
                            <tr>
                                <td class="remove-product">
                                    <a href="{{ route('cart.remove', $cart->rowId) }}" class="text-danger">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                                <td class="product-price">
                                    <p>{{$cart->qty }}</p>
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
                                @if(isset($setting['delivery_price']))
                                    {!!  Cart::instance('cart')->total() + $setting['delivery_price'] !!}
                                @else
                                    {{Cart::instance('cart')->total() }}
                                @endif
                                @if(isset($setting[app()->getLocale() . '_currency']))
                                    {{ $setting[app()->getLocale() . '_currency'] }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <p class="cape-shop">
                    {{ __('site.Do you want to complete the purchase') }}
                </p>
            </div>
        </div>
        <div class="last-part small-container">
            <div class="container">
                <form id="payment-form" action="{{ route('order.checkPayment') }}" method="post" class="finsh-requet">
                    @csrf

                    <div class="pic-select pic-select-auth pic-select-auth-any row">
                        <div class="col-md-9">
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
                            <a class="btn btn-sm custom-button" id="coupon-submit">
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

                    <p>
                        {{ __('site.Order.payment method') }}
                    </p>
                    <div>
                        <label>
                            <input id="payment" class="payment_method" type="radio" name="payment_method"
                                   value="payment">
                            <span></span>
                            {{ __('site.Credit Card') }}
                        </label>
                    </div>
                    <div>
                        <label>
                            <input id="on_delivery" class="payment_method" type="radio" name="payment_method"
                                   value="on_delivery" checked>
                            <span></span>
                            {{ __('site.On delivery') }}
                        </label>
                    </div>


                    <div class="pic-select pic-select-auth pic-select-auth-any">
                        <p class="name-input">
                            {{__('site.Name')}}
                        </p>
                        <label class="input-style">
                            <input type="text" name="billing_name"
                                   value="@if(auth()->check()) {{ auth()->user()->name }} @endif">
                        </label>
                        @if ($errors->has('billing_name'))
                            <div class="alert alert-danger">{{ $errors->first('billing_name') }}</div>
                        @endif
                        <p class="name-input">
                            {{__('site.Phone')}}
                        </p>
                        <label class="input-style">
                            <input type="text" name="billing_phone"
                                   value="@if(auth()->check()){{ auth()->user()->phone }}@endif">
                            @if ($errors->has('billing_phone'))
                                <div class="alert alert-danger">{{ $errors->first('billing_phone') }}</div>
                            @endif
                        </label>
                        <p class="name-input">
                            {{__('site.E-mail')}}
                        </p>
                        <label class="input-style">
                            <input type="email" name="billing_email"
                                   value="@if(auth()->check()){{ auth()->user()->email }}@endif">
                        </label>
                        @if ($errors->has('billing_email'))
                            <div class="alert alert-danger">{{ $errors->first('billing_email') }}</div>
                        @endif

                        <p class="name-input">
                            {{__('site.Address')}}
                        </p>
                        <label class="input-style">
                            <input type="text" class="form-control" name="billing_address"
                                   value="@if(auth()->check()){{ auth()->user()->address }}@endif" id="search-input">
                            <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                            <input type="hidden" id="lat" name="lat"
                                   value="@if(auth()->check()){{ auth()->user()->lat }}@endif">
                            <input type="hidden" id="lng" name="lng"
                                   value="@if(auth()->check()){{ auth()->user()->lng }}@endif">
                        </label>
                        @if ($errors->has('billing_address'))
                            <div class="alert alert-danger">{{ $errors->first('billing_address') }}</div>
                        @endif


                    </div>
                    <button type="submit">
                        {{ __('site.Order.Confirm Order') }}
                    </button>
                </form>
            </div>
        </div>
    @else

        <div class="text-center pb-5">
            <h2 class=" text-center text-danger">{{ __('site.The cart now is empty') }}</h2>
            <a class="text-center" href="{{ route('products.index') }}">{{ __('site.Order now') }}</a>
        </div>

        @include('web.layouts.our-meals')
    @endif

@endsection
@section('scripts')
    @include('partials.google-map', ['lat' => auth()->user()->lat, 'lng' => auth()->user()->lng])
    <script type="text/javascript">
        $(document).ready(function () {
            $('#coupon-submit').click(function (e) {
                e.preventDefault();
                var coupon = $('#coupon').val(),
                    discountElement = $('.discount-preview'),
                    totalBefore = document.getElementById('before_discount'),
                    totalAfter = document.getElementById('after_discount'),
                    discountAmount = document.getElementById('discount_amount');

                $.ajax({
                    url: "{{ route('product.checkCoupon') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        coupon: coupon
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === false) {
                            toastr.error(response.msg, {timeOut: "50000",})
                        } else {
                            totalBefore.innerText = response.data.totalBefore;
                            totalAfter.innerText = response.data.billing_total;
                            discountAmount.innerText = response.data.coupon.amount;
                            discountElement.removeAttr('style');
                            toastr.success(response.msg, {timeOut: "50000",})
                        }

                    }
                });
            });
        });
    </script>
@endsection
