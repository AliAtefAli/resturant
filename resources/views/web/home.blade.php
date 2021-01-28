@extends('web.layouts.app')
<!--Start Loading-->
<div class="loading">
    <div>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!--End Loading-->

@section('content')

    <!--Start Main Slider-->
    <div class="main-slider">
        <div class="owl-carousel owl-theme main-slider-slider">
            @foreach($sliders as $slider)
                <a href="@if(isset($slider->url)) {{ url($slider->url) }} @endif" class="item"
                   style="background-image: url( {{ asset('assets/uploads/sliders/' . $slider->image) }}"></a>
            @endforeach
        </div>
    </div>
    <!--End Main Slider-->
    <!--Start Pace-->
    <div class="pace-section">
        <img lazy="loading" src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <div class="container">
            <h2 class="header-section wow zoomIn">
                {{__('dashboard.subscriptions.Subscriptions')}}
            </h2>
            <div class="show-way">
                {{__('site.Show style')}}
                <span class="mulet"><img lazy="loading" src="{{asset('web_files/images/mult.png')}}"></span>
                <span class="single"><img lazy="loading" src="{{asset('web_files/images/single.png')}}"></span>
            </div>
            <div class="pace-items">
                <div class="row justify-content-center">
                    @foreach($subscriptions as $subscription)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{route('subscriptions.show', $subscription)}}" class="pace-item wow fadeInDown">
                                <div class="img-container">
                                    <div class="img"
                                         style="background-image: url({{ asset('assets/uploads/subscriptions/' . $subscription->image) }});"></div>
                                    <div class="img-overlay"
                                         style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                                </div>
                                <h3>
                                    {{$subscription->name}}
                                </h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--End Pace-->
    <!--Start Line-->
    <div class="line-section">
                <span class="img">
                    @if(isset($setting['logo']))
                        <img lazy="loading" src="{{asset('assets/uploads/settings/' . $setting['logo'])}}">
                    @endif
                    </span>
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
    <!--Start Section1-->
    <div class="section1">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                {{ __('site.Categories') }}
            </h2>
        </div>
        @foreach($categories as $category)
            <div class="section1-container margin-responsive">
                <h2 class="header-section1 wow zoomIn">
                    <a href="#{{$category->id}}" class="">{{ $category->name }}</a>
                </h2>
                <div class="owl-carousel owl-theme section1-name-slider">
                    @foreach($category->categories as $sub_category)
                        <a href="{{route('category.index' , $sub_category->id)}}"
                        class="item wow fadeInDown {{ $loop->first ? 'active' : '' }}">
                        <h3>{{$sub_category->name}}</h3>
                    </a>
                    @endforeach
                </div>
                <div class="owl-carousel owl-theme section1-product-slider">
                    @foreach($category->categories as $sub_category)

                        @foreach($sub_category->products as $product)
                            <a href="{{ route('products.show', $product) }}" id="#{{$sub_category->id}}"
                               class="item wow fadeInDown">
                                <div class="img">
                                    <img lazy="loading"
                                        src="@if($product->images->count() > 0){{ asset('assets/uploads/products/' . $product->images->first()->path ) }} @endif">
                                </div>
                                <div class="info-pro">
                                    <span class="name-product">{{ $product->name }}</span>
                                    <span class="price">{{ $product->price }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif</span>
                                </div>

                            </a>
                        @endforeach
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <!--End Section1-->
    <!--Start Thay Say Us-->
    <div class="thay-say-us">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                {{ __('site.Customer reviews') }}
            </h2>
        </div>
        <div class="margin-responsive">
            <div class="owl-carousel owl-theme thay-say-us-slider">
                @foreach($rates as $rate)
                    <div class="item wow fadeInDown">
                        <div class="img">
                            <img lazy="loading"
                                src="@if(isset($rate->user->image)){{ asset('assets/uploads/users/' . $rate->user->image) }}@else {{ asset('web_files/images/person.png') }}@endif"
                                width="90">
                        </div>
                        <div class="text">
                            <div class="info-person"><span class="name-customer">{{$rate->user->name}}</span>
                                <div class="stars">
                                    @for($i = 0; $i < 5; $i++)
                                        <span><i class="la la-star{{ $rate->amount <= $i ? '-o' : '' }}"></i></span>
                                    @endfor
                                </div>
                            </div>
                            <p>
                                {{$rate->comment }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--End Thay Say Us-->
    <!--Start Our Meal-->
    @include('web.layouts.our-meals')
    <!--End Our Meal-->

@endsection
