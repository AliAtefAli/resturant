@extends('web.layouts.app')

@section('content')

    <<div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form class="form-pic-select">
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-page">
                        تسجيل جديد
                    </p>
                    <p class="name-input">
                        الاسم
                    </p>
                    <label class="input-style">
                        <input type="text">
                    </label>
                    <p class="name-input">
                        رقم الجوال
                    </p>
                    <label class="input-style">
                        <input type="tel">
                    </label>
                    <p class="name-input">
                        البريد الالكترونى
                    </p>
                    <label class="input-style">
                        <input type="email">
                    </label>
                    <p class="name-input">
                        العنوان
                    </p>
                    <label class="input-style">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text">
                    </label>
                    <p class="name-input">
                        كلمة المرور
                    </p>
                    <label class="input-style">
                        <input type="password">
                    </label>
                    <p class="name-input">
                        تاكيد كلمة المرور
                    </p>
                    <label class="input-style">
                        <input type="password">
                    </label>
                    <div class="">
                        <a href="#" class="link-forget">
                            سياسة الاستخدام
                        </a>
                    </div>
                    <button class="btn-aaa" type="submit">
                        تسجيل جديد
                    </button>
                    <div class="line-between"></div>
                </div>
            </div>
        </form>
        <a href="{{route('web.login')}}" class="btn-aaa" type="submit">
            تسجيل دخول
        </a>
    </div>
@endsection

