@extends('web.layouts.app')

@section('content')

    <!--Start User-->

    <div class="user-section">
        <div class="nav-side-page">
                    <span class="open-nav-side-page">
                        <i class="fas fa-caret-left"></i>
                    </span>
            <span class="top-head-side"></span>
            <img class="logo" src="{{asset('web_files/images/logo.png')}}">
            <ul class="list-unstyled">
                <li class="active">
                    <a href="#">
                        <i class="fas fa-user"></i>
                        البيانات الشخصية
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-bread-slice"></i>
                        الباقات
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-utensils"></i>
                        المنيو الاسبوعى
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-box"></i>
                        الطلبات
                    </a>
                </li>
            </ul>
        </div>
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

@endsection