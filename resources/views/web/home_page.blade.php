@extends('web.layouts.app')

@section('content')

<!--Start Main Slider-->
<div class="main-slider">
    <div class="owl-carousel owl-theme main-slider-slider">
        @foreach($sliders as $slider)
        @endforeach
            <a href="#" class="item" style="background-image: url('{{asset('web_files/images/slider.jpg')}}')"></a>
    </div>
</div>
<!--End Main Slider-->
<!--Start Pace-->
<div class="pace-section">
    <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
    <div class="container">
        <h2 class="header-section wow zoomIn">
            الباقات
        </h2>
        <div class="show-way">
            طريقة العرض:
            <span class="mulet">
                            <img src="{{asset('web_files/images/mult.png')}}">
                        </span>
            <span class="single">
                            <img src="{{asset('web_files/images/single.png')}}">
                        </span>
        </div>
        <div class="pace-items">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
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
                <div class="col-md-6 col-lg-4">
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
                <div class="col-md-6 col-lg-4">
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
                <div class="col-md-6 col-lg-4">
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
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="pace-item wow fadeInDown">
                        <div class="img-container">
                            <div class="img"></div>
                            <div class="img-overlay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                        </div>
                        <h3>
                            غذاء العمل (شهرى)
                        </h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Pace-->
<!--Start Line-->
<div class="line-section">
                <span class="img">
                        <img src="{{asset('web_files/images/logoo.png')}}">
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
            الاقسام
        </h2>
    </div>
    <div class="section1-container margin-responsive">
        <h2 class="header-section1 wow zoomIn">
            اسم القسم الرئيسى
        </h2>
        <div class="owl-carousel owl-theme section1-name-slider">
            <a href="#" class="item wow fadeInDown">
                <h3>
                    اسم القسم الفرعي
                </h3>
            </a>
            <a href="#" class="item wow fadeInDown">
                <h3>
                    اسم القسم الفرعي
                </h3>
            </a>
            <a href="#" class="item wow fadeInDown">
                <h3>
                    اسم القسم الفرعي
                </h3>
            </a>
            <a href="#" class="item wow fadeInDown">
                <h3>
                    اسم القسم الفرعي
                </h3>
            </a>
            <a href="#" class="item wow fadeInDown">
                <h3>
                    اسم القسم الفرعي
                </h3>
            </a>
            <a href="#" class="item wow fadeInDown">
                <h3>
                    اسم القسم الفرعي
                </h3>
            </a>
            <a href="#" class="item wow fadeInDown">
                <h3>
                    اسم القسم الفرعي
                </h3>
            </a>
            <a href="#" class="item wow fadeInDown">
                <h3>
                    اسم القسم الفرعي
                </h3>
            </a>
        </div>
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
<!--Start Thay Say Us-->
<div class="thay-say-us">
    <div class="container">
        <h2 class="header-section wow zoomIn">
            آراء العملاء
        </h2>
    </div>
    <div class="margin-responsive">
        <div class="owl-carousel owl-theme thay-say-us-slider">
            <div class="item wow fadeInDown">
                <div class="img">

                </div>
                <div class="text">
                    <div class="info-person">
                                    <span class="name-customer">
                                        اسم العميل
                                    </span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                    </p>
                </div>
            </div>
            <div class="item wow fadeInDown">
                <div class="img">

                </div>
                <div class="text">
                    <div class="info-person">
                                    <span class="name-customer">
                                        اسم العميل
                                    </span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                    </p>
                </div>
            </div>
            <div class="item wow fadeInDown">
                <div class="img">

                </div>
                <div class="text">
                    <div class="info-person">
                                    <span class="name-customer">
                                        اسم العميل
                                    </span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                    </p>
                </div>
            </div>
            <div class="item wow fadeInDown">
                <div class="img">

                </div>
                <div class="text">
                    <div class="info-person">
                                    <span class="name-customer">
                                        اسم العميل
                                    </span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                    </p>
                </div>
            </div>
            <div class="item wow fadeInDown">
                <div class="img">

                </div>
                <div class="text">
                    <div class="info-person">
                                    <span class="name-customer">
                                        اسم العميل
                                    </span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                    </p>
                </div>
            </div>
            <div class="item wow fadeInDown">
                <div class="img">

                </div>
                <div class="text">
                    <div class="info-person">
                                    <span class="name-customer">
                                        اسم العميل
                                    </span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                    </p>
                </div>
            </div>
            <div class="item wow fadeInDown">
                <div class="img">

                </div>
                <div class="text">
                    <div class="info-person">
                                    <span class="name-customer">
                                        اسم العميل
                                    </span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                    </p>
                </div>
            </div>
            <div class="item wow fadeInDown">
                <div class="img">

                </div>
                <div class="text">
                    <div class="info-person">
                                    <span class="name-customer">
                                        اسم العميل
                                    </span>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Thay Say Us-->
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
