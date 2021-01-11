@extends('web.layouts.app')

@section('content')
    <!--Select Pic-->
    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form class="form-pic-select">
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-page">
                        تسجيل الدخول
                    </p>
                    <p class="name-input">
                        رقم الجوال
                    </p>
                    <label class="input-style">
                        <input type="tel">
                    </label>
                    <p class="name-input">
                        كلمة المرور
                    </p>
                    <label class="input-style">
                        <input type="password">
                    </label>
                    <div class="text-center">
                        <a href="{{route('web.forget_pass')}}" class="link-forget">
                            نسيت كلمة المرور؟
                        </a>
                    </div>
                    <button class="btn-aaa" type="submit">
                        تسجيل الدخول
                    </button>
                    <div class="line-between"></div>
                </div>
            </div>
        </form>
        <a href="{{route('web.register')}}" class="btn-aaa" type="submit">
            تسجيل جديد
        </a>
    </div>
@endsection

