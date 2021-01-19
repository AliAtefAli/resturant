@extends('web.layouts.app')

@section('content')

    <!--Start User-->

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <p class="pic-p">
                {{__('site.User Subscriptions')}}
            </p>

            <div class="owl-carousel owl-theme pic-slider">
                @foreach($subscribed_packages as $package)
                    <div class="item">
                        <div class="image">
                            <div class="img-image" style="background-image: url('{{asset('web_files/images/item.jpg')}}')"></div>
                            <div class="over-lay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                        </div>
                        <span class="in">
                                    {{$package->name}}
                                </span>
                        <div class="list-ul">
                            <ul class="list-unstyled">
                                @foreach($package->products as $product)
                                <li>
                                    <span></span>
                                        {{$product->name}}
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <p class="price">
                            {{ $product->price }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                        </p>
                        <p class="shiping">
                            {{ __('site.Delivery') }}:  @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif                        </p>
                        <p class="person-number">
                            {{ __('site.People count') }} : {{$package->pivot->count}}
                        </p>

                        @foreach($package->products as $product)
                            <p class="text">
                                {!! $product->description!!}
                            </p>
                        @endforeach

                    </div>
                @endforeach
            </div>

            <p class="pic-p">
                {{__('site.User Finished Subscriptions')}}
            </p>

            <div class="owl-carousel owl-theme pic-slider">
                @foreach($finished_subscribed_packages as $package)
                    <div class="item">
                        <div class="image">
                            <div class="img-image" style="background-image: url('{{asset('web_files/images/item.jpg')}}')"></div>
                            <div class="over-lay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                        </div>
                        <span class="in">
                                    {{$package->name}}
                                </span>
                        <div class="list-ul">
                            <ul class="list-unstyled">
                                @foreach($package->products as $product)
                                    <li>
                                        <span></span>
                                        {{$product->name}}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <p class="price">
                            {{ $product->price }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                        </p>
                        <p class="shiping">
                            {{ __('site.Delivery') }}:  @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif                        </p>
                        <p class="person-number">
                            {{ __('site.People count') }} : {{$package->pivot->count}}
                        </p>

                        @foreach($package->products as $product)
                            <p class="text">
                                {!! $product->description!!}
                            </p>
                        @endforeach

                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!--End User-->
    <!--Start Our Meal-->

    <div class="our-meal">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                من وجباتنا
            </h2>
            <div class="owl-carousel owl-theme our-meal-slider">
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
            </div>
        </div>
    </div>

    <!--End Our Meal-->

@endsection
