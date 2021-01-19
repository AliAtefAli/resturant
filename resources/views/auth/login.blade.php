@extends('web.layouts.app')

@section('content')
    <!--Select Pic-->
    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form method="POST" action="{{ route('login') }}" class="form-pic-select">
            @csrf
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-page">
                        {{ __('site.Login') }}
                    </p>
                    <p class="name-input">
                        {{__('site.Phone')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="email">
                    </label>
                    <p class="name-input">
                        {{__('site.Password')}}
                    </p>
                    <label class="input-style">
                        <input type="password" name="password">
                    </label>
                    <div class="text-center">
                        <a href="{{route('password.request')}}" class="link-forget">
                            {{__('site.Forget Password')}}
                        </a>
                    </div>
                    <button class="btn-aaa" type="submit">
                        {{__('site.Login')}}
                    </button>
                    <div class="line-between"></div>
                </div>
            </div>
        </form>
        <a href="{{route('register')}}" class="btn-aaa" type="submit">
            {{__('site.Register')}}
        </a>
    </div>
@endsection

