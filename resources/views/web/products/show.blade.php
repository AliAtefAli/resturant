@extends('web.layouts.app')

@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection

@section('content')

    <!--Start Singe Product-->

    <div class="single-product single-product1">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <div class="container">
            <div class="product-slider-img">
                <div class="img-pro">
                    <img
                        src="@if($product->images->count() > 0){{asset('assets/uploads/products/' . $product->images->first()->path)}} @endif">
                    <a href="{{ route('products.makeFav', $product->id) }}" class="fiv">
                        <i class="fas fa-heart"></i>
                    </a>
                    <a href="#" class="shear">
                        <i class="fas fa-share-alt"></i>
                    </a>
                </div>
                <div class="img-pro-contain">
                    @if($product->images->count() > 1)
                        @foreach($product->images as $index => $image)
                            <div class="img-pro img-sper @if($index == 0) active @endif">
                                <img src="{{asset('assets/uploads/products/' . $image->path)}}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <p class="price">
                {{ $product->price }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
            </p>
            <div class="number-of-product-section">
                <form action="{{ route('products.addToCart', $product) }}" method="post">
                    @csrf
                    <div class="container-form">
                        <span class="plus">+</span>
                        <input type="text" name="qty" class="qty" value="1">
                        <span class="munas">-</span>
                    </div>
                    <p class="text-product">{!! $product->description !!}</p>
                    <button type="submit" class="add-to-cart" product="{{ $product }}">
                        {{ __('site.Add to cart') }}
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="section1">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                {{__('site.Related Products')}}
            </h2>
        </div>
        <div class="section1-container margin-responsive">
            <div class="owl-carousel owl-theme section1-product-slider">
                @foreach($related_products as $product)
                    <a href="{{ route('products.show', $product) }}" class="item wow fadeInDown">
                        <div class="img">
                            <img
                                src="@if($product->images->count() > 1) {{asset('assets/uploads/products/' . $product->images->first()->path)}} @endif">
                        </div>
                        <div class="info-pro">
                            <span class="name-product">{{$product->name}}</span>
                            <span class="price">
                                    {{ $product->price }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                                </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!--End Section1-->

@endsection
