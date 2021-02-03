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
               style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
            <a href="#" class="item"
               style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
            <a href="#" class="item"
               style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
            <a href="#" class="item"
               style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
            <a href="#" class="item"
               style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
        </div>
    </div>

    <!--End Main Slider-->
    <!--Start Singe Product-->

    <div class="single-product">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <div class="container">
            <div class="meails">
                @foreach($subscription->products as $product)
                    <div class="meal">
                        <span></span>
                        {{$product->name}}
                    </div>
                @endforeach

            </div>
            <p class="price">
                {{ __('site.Price') }}
                : {{$subscription->price}}  @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
            </p>
            <p class="price">
                {{ __('site.Subscriptions Duration') }}
                : {{$subscription->duration_in_day}} {{ __('site.Days') }}
            </p>
            <p class="sheping">
                {{ __('site.Delivery') }}
                : @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
            </p>
            <p class="text-product">
                {!! $subscription->description !!}
            </p>
            <div class="number-of-product-section">


                <a href="{{ route('subscriptions.create', $subscription) }}" class="custom-button" type="submit">
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
@endsection
