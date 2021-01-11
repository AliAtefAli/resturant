@extends('web.layouts.app')

@section('content')
    <!--Select Pic-->
    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form class="form-pic-select">
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-page">
                        تفعيل الحساب
                    </p>
                    <p class="name-input">
                        رقم الكود
                    </p>
                    <label class="input-style">
                        <input type="text">
                    </label>
                    <button class="btn-aaa" type="submit">
                        تاكيد
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

