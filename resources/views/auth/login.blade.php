@extends('web.layouts.app')

@section('content')
    <!--Select Pic-->
    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form method="POST" action="{{ route('User.login') }}" class="form-pic-select">
            @csrf
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-page">
                        {{ __('site.Login') }}
                    </p>
                    <p class="name-input">
                        {{__('site.Phone')}} & {{__('site.E-mail')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="email" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </label>
                    <p class="name-input">
                        {{__('site.Password')}}
                    </p>
                    <label class="input-style">
                        <input type="password" name="password">
                        @if(session()->has('passwordCheck'))
                            <div class="alert alert-danger">{{session()->get('passwordCheck')}}</div>
                        @endif
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                        @endif

                    </label>

                    <div class="text-center">
                        <a href="{{route('reset_pass')}}" class="link-forget">
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
        <button class="btn-aaa" type="submit">
            <a style="color: #fff" href="{{route('register')}}">
                {{__('site.Register')}}
            </a>
        </button>
    </div>
@endsection

