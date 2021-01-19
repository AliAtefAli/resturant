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
                        {{__('site.Phone')}} & {{__('site.E-mail')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="email">
                    </label>
                    <button class="btn-aaa" type="submit">
                        تاكيد
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

