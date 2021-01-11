@extends('web.layouts.app')

@section('content')

    <!--Start Head breadcramp-->

    <div class="breadcramp">
        <div class="container">
            <p>
                <a href="#">
                    الباقات
                </a>
                <i class="fas fa-chevron-left"></i>
                <a href="#">
                    يومى
                </a>
            </p>
        </div>
    </div>

    <!--End Head breadcramp-->
    <!--Start Main Slider-->

    <div class="main-slider main-slider-custom-1">
        <div class="owl-carousel owl-theme main-slider-slider">
            <a href="#" class="item" style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
            <a href="#" class="item" style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
            <a href="#" class="item" style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
            <a href="#" class="item" style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
            <a href="#" class="item" style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')"></a>
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
                    وجبتين رئيسيتين
                </div>
                <div class="meal">
                    <span></span>
                    سلطتين كاملة
                </div>
                <div class="meal">
                    <span></span>
                    حلي نباتي
                </div>
            </div>
            <p class="price">
                120 ريال سعودي
            </p>
            <p class="sheping">
                التوصيل: 15 ريال سعودي
            </p>
            <p class="text-product">
                استمتع بيوم كامل من الأكل النباتي الصرف مع الديناصور النباتي، تحتوي الوجبات على حوالي ١٥٠٠ سعرة حرارية، عالية البروتين، صحية ولذيذة
            </p>
            <div class="number-of-product-section">
                        <span class="text-ali">
                            عدد الأشخاص:
                        </span>
                <form action="web/subscriptions/submit">
                    <div class="container-form">
                        <span class="plus">+</span>
                        <input type="text" value="1">
                        <span class="munas">-</span>
                    </div>
                    <button type="submit">
                        اشترك الان
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!--Start Pace-->

    <div class="pace-section pace-section-single">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                باقات اخرى
            </h2>
            <div class="pace-items">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="#" class="pace-item wow fadeInDown">
                            <div class="img-container">
                                <div class="img"></div>
                                <div class="img-overlay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                            </div>
                            <h3>
                                يومى
                            </h3>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="#" class="pace-item wow fadeInDown">
                            <div class="img-container">
                                <div class="img"></div>
                                <div class="img-overlay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                            </div>
                            <h3>
                                اسبوعى
                            </h3>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="#" class="pace-item wow fadeInDown">
                            <div class="img-container">
                                <div class="img"></div>
                                <div class="img-overlay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                            </div>
                            <h3>
                                شهرى
                            </h3>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="#" class="pace-item wow fadeInDown">
                            <div class="img-container">
                                <div class="img"></div>
                                <div class="img-overlay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                            </div>
                            <h3>
                                غذاء العمل (اسبوعى)
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--End Pace-->

@endsection