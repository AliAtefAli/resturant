@extends('web.layouts.app')

@section('content')

    <!--Start User-->

    <div class="user-section">
        @include('web._sidebar')
        <div class="user-info">
            <div class="img-user">
                <form>
                    <div class="imgg">
                        <i class="fas fa-pencil-alt"></i>
                        <input id="img-user" type="file">
                        <img src="{{asset('web_files/images/healthy-food-bowl.jpg')}}">
                    </div>
                    <div class="form-user">
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        الاسم
                                    </span>
                            <input type="text" readonly>
                        </label>
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        رقم الجوال
                                    </span>
                            <input type="tel" readonly>
                        </label>
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        البريد الالكترونى
                                    </span>
                            <input type="email" readonly>
                        </label>
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        العنوان
                                    </span>
                            <input type="text" readonly>
                        </label>
                        <label>
                            <i class="fas fa-pencil-alt"></i>
                            <span>
                                        كلمة المرور
                                    </span>
                            <input type="password" readonly>
                        </label>
                    </div>
                </form>
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