@extends('web.layouts.app')
@section('title', trans('site.Subscriptions'))
@section('content')

    <!--Start Head breadcramp-->

    <div class="breadcramp">
        <div class="container">
            <p>
                <a href="#">
                    {{__('site.Subscriptions')}}
                </a>
                <i class="fas @if(app()->getLocale() == 'ar') fa-chevron-left @else fa-chevron-right @endif"></i>
                <a href="#">
                    {{ $subscription->name }}
                </a>
            </p>
        </div>
    </div>

    <!--End Head breadcramp-->
    <!--Start Main Slider-->

    <div class="main-slider main-slider-custom-1">
        <div class="owl-carousel owl-theme main-slider-slider">
            <a href="#" class="item"
               style="background-image: url('{{asset('assets/uploads/subscriptions/' . $subscription->image)}}')"></a>
        </div>
    </div>

    <!--End Main Slider-->
    <!--Start Singe Product-->

    <div class="single-product">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <div class="container">
            <div class="meails">
                <div class="meal">
                    <span></span>
                    {!! $subscription->translate(lang())->products !!}
                </div>
            </div>
            <p id="price" class="price">
                {{ __('site.Price') }}
                : {{$subscription->price}}  @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
            </p>
            <p id="duration" class="price">
                @if($subscription->duration_in_day <= 10)
                    {{ __('site.Subscriptions Duration') }}
                    : {{$subscription->duration_in_day}} {{ __('site.Days') }}
                @else
                    {{ __('site.Subscriptions Duration') }}
                    : {{$subscription->duration_in_day}} {{ __('site.Day') }}
                @endif
            </p>
            <p class="sheping">
                {{ __('site.Delivery') }}
                : {{$subscription->delivery_price}} @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
            </p>
            <p class="text-product">
                {!! $subscription->description !!}
            </p>
            <div class="number-of-product-section">


                <a href="{{ route('subscriptions.create', $subscription) }}" style="padding-top: 24px" class="custom-button" type="submit">
                    {{__('site.Submit Now')}}
                </a>
            </div>
        </div>
    </div>

    <!--Start Pace-->

    <div class="pace-section pace-section-single">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                {{ __('site.Other Subscriptions') }}
            </h2>
            <div class="pace-items">
                <div class="row justify-content-center">
                    @foreach($other_subscriptions as $subscription)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ route('subscriptions.show', $subscription) }}" class="pace-item wow fadeInDown">
                                <div class="img-container">
                                    <div class="img"
                                         style="background-image: url('{{asset('assets/uploads/subscriptions/' . $subscription->image)}}')"></div>
                                    <div class="img-overlay"
                                         style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                                </div>
                                <h3>
                                    {{ $subscription->name }}
                                </h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!--End Pace-->

@endsection
@section('scripts')
    <script>
        $('.container-form  .munas').click(function () {
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
    @if(app()->getLocale() == 'ar')
    <script>
        String.prototype.toArabicDigits = function () {
            var id = ['۰', '۱', '۲', '۳', '٤', '٥', '٦', '۷', '۸', '۹'];
            return this.replace(/[0-9]/g, function (w) {
                return id[+w]
            });
        }
        var price = $('#price'),
            duration = $('#duration'),
            sheping = $('.sheping');
        price.text(price.text().toArabicDigits());
        duration.text(duration.text().toArabicDigits());
        sheping.text(sheping.text().toArabicDigits());

    </script>
    @endif
@endsection
