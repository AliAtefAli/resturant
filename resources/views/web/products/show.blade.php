@extends('web.layouts.app')

@section('content')

    <!--Start Singe Product-->

    <div class="single-product single-product1">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <div class="container">
            <div class="product-slider-img">
                <div class="img-pro">
                    <img src="{{asset('web_files/images/4207074.png')}}">
                    <a href="#" class="fiv">
                        <i class="fas fa-heart"></i>
                    </a>
                    <a href="#" class="shear">
                        <i class="fas fa-share-alt"></i>
                    </a>
                </div>
                <div class="img-pro-contain">
                    <div class="img-pro img-sper active">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="img-pro img-sper">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="img-pro img-sper">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                </div>
            </div>
            <p class="price">
                120 ريال سعودي
            </p>
            <div class="number-of-product-section">
                <form>
                    <div class="container-form">
                        <span class="plus">+</span>
                        <input type="text" value="1">
                        <span class="munas">-</span>
                    </div>
                    <p class="text-product">
                        استمتع بيوم كامل من الأكل النباتي الصرف مع الديناصور النباتي، تحتوي الوجبات على حوالي ١٥٠٠ سعرة حرارية، عالية البروتين، صحية ولذيذة
                    </p>
                    <button type="submit">
                        اضف للسلة
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="section1">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                منتجات متشابهة
            </h2>
        </div>
        <div class="section1-container margin-responsive">
            <div class="owl-carousel owl-theme section1-product-slider">
                <a href="#" class="item wow fadeInDown">
                    <div class="img">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="info-pro">
                                <span class="name-product">
                                    اسم المنتج
                                </span>
                        <span class="price">
                                    100 رس
                                </span>
                    </div>
                </a>
                <a href="#" class="item wow fadeInDown">
                    <div class="img">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="info-pro">
                                <span class="name-product">
                                    اسم المنتج
                                </span>
                        <span class="price">
                                    100 رس
                                </span>
                    </div>
                </a>
                <a href="#" class="item wow fadeInDown">
                    <div class="img">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="info-pro">
                                <span class="name-product">
                                    اسم المنتج
                                </span>
                        <span class="price">
                                    100 رس
                                </span>
                    </div>
                </a>
                <a href="#" class="item wow fadeInDown">
                    <div class="img">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="info-pro">
                                <span class="name-product">
                                    اسم المنتج
                                </span>
                        <span class="price">
                                    100 رس
                                </span>
                    </div>
                </a>
                <a href="#" class="item wow fadeInDown">
                    <div class="img">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="info-pro">
                                <span class="name-product">
                                    اسم المنتج
                                </span>
                        <span class="price">
                                    100 رس
                                </span>
                    </div>
                </a>
                <a href="#" class="item wow fadeInDown">
                    <div class="img">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="info-pro">
                                <span class="name-product">
                                    اسم المنتج
                                </span>
                        <span class="price">
                                    100 رس
                                </span>
                    </div>
                </a>
                <a href="#" class="item wow fadeInDown">
                    <div class="img">
                        <img src="{{asset('web_files/images/4207074.png')}}">
                    </div>
                    <div class="info-pro">
                                <span class="name-product">
                                    اسم المنتج
                                </span>
                        <span class="price">
                                    100 رس
                                </span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!--End Section1-->

@endsection