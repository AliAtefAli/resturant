@extends('web.layouts.app')

@section('content')
    <!--Select Pic-->
    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form class="form-pic-select" action="{{ route('set_confirm') }}" method="post">
            @csrf
            <div class="container">
                <div class="pic-select pic-select-auth">

                    <p class="name-page">
                        تفعيل الحساب
                    </p>
                    <p class="name-input">
                        {{__('code')}}
                    </p>
                    <label class="input-style">
                        <input type="text"name="code">
                    </label>
                    @if ($errors->has('code'))
                        <div class="alert alert-danger">{{ $errors->first('code') }}</div>
                    @endif

                    <p class="name-input">
                        {{__('site.Password')}}
                    </p>
                    <label class="input-style">
                        <input type="password" name="password">
                    </label>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                    @endif

                    <p class="name-input">
                        {{__('site.Password confirmation')}}
                    </p>
                    <label class="input-style">
                        <input type="password" name="password_confirmation">
                    </label>
                    @if ($errors->has('password_confirmation'))
                        <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                    @endif

                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button class="btn-aaa" type="submit">
                        {{__('confirm')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

