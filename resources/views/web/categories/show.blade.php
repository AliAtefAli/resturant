@extends('web.layouts.app')

@section('content')

    <div class="section1 section1-custom1">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                {{ __('site.Categories') }}
            </h2>
        </div>
        <div class="section1-container">
            <h2 class="header-section1 wow zoomIn margin-responsive">
                {{$super->name}}
            </h2>
            <h2 class="header-section1 wow zoomIn margin-responsive" style="color: #517461">
                {{$category->name}}
            </h2>
            <div class="container">
                <div class="row section1-product-row">
                    @foreach($category->products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                            <a href="{{ route('products.show', $product) }}" class="item wow fadeInDown">
                                <div class="img">
                                    @foreach($product->images as $image)
                                        <img src="/assets/uploads/products/{{$image->path}}">
                                    @endforeach
                                </div>
                                <div class="info-pro"><span class="name-product">{{$product->name}}</span>
                                    <span class="price">{{$product->price}}</span>
                                </div>
                            </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
