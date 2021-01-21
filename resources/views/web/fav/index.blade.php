@extends('web.layouts.app')

@section('content')

    <!--Start Section1-->

    <div class="section1 section1-custom1">
        <div class="section1-container">
            <div class="container">
                <div class="row section1-product-row">


                        @foreach($favorites as $favorite)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="item wow fadeInDown">

                                    <a href="{{ route('products.makeFav', $favorite->product->id) }}" class="heart">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <a href="{{ route('products.index') }}" class="item wow fadeInDown">
                                    <div class="img">
                                        <img
                                            src="@if($favorite->product->images->count() > 0){{ asset('assets/uploads/products/' . $favorite->product->images->first()->path ) }} @endif">
                                    </div>
                                    <div class="info-pro">
                                        <span class="name-product">{{$favorite->product->name}}</span>
                                        <span class="price">
                                            {{$favorite->product->price}}
                                            @if(isset($setting[app()->getLocale() . '_currency']))
                                                {{ $setting[app()->getLocale() . '_currency'] }}
                                            @endif
                                        </span></div>
                                </a>
                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>

    <!--End Section1-->

@endsection
