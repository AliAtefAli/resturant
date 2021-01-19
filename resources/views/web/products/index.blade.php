@extends('web.layouts.app')

@section('content')

    <!--Start Section1-->

    <div class="section1 section1-custom1">
        <div class="section1-container">
            <div class="container">
                <h2 class="header-section wow zoomIn">
                    {{ __('site.Products') }}
                </h2>
                <div class="row section1-product-row">
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                                <a href="{{ route('products.show', $product) }}" class="item wow fadeInDown">
                                    <div class="img">
                                        @foreach($product->images as $image)
                                            <img src="/assets/uploads/products/{{$image->path}}">
                                        @endforeach
                                    </div>
                                    <div class="info-pro"><span class="name-product">{{$product->name}}</span>
                                        <span class="price">{{$product->price}} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                                        </span>
                                    </div>
                                </a>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">{!! $products->links() !!}</div>
            </div>
        </div>
    </div>

    <!--End Section1-->

@endsection
