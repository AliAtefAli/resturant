@extends('web.layouts.app')

@section('content')
    <!--Select Pic-->
    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form action="{{ route('get_code') }}" method="post" class="form-pic-select">
            @csrf
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-page">
                        {{ __('site.Password') }}
                    </p>
                    <p class="name-input">
                        {{__('site.new password')}}
                    </p>
                    <label class="input-style">
                        <input type="password" name="password">
                    </label>

                    <p class="name-input">
                        {{__('site.confirm password')}}
                    </p>
                    <label class="input-style">
                        <input type="password" name="password_confirmation">
                    </label>
                    <button class="btn-aaa" type="submit">
                        {{__('site.Confirm')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

