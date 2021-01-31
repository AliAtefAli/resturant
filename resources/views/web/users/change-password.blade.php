@extends('web.layouts.app')

@section('content')

    <!--Start User-->

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <div class="img-user">
                <form method="POST" action="{{ route('users.changePassword', auth()->user()) }}" class="form-pic-select" enctype="multipart/form-data">
                    @csrf

                    <div class="container">
                        <div class="pic-select pic-select-auth">
                            <p class="name-input">
                                {{__('site.Old Password')}}
                            </p>
                            <label class="input-style">
                                <input type="password" name="old_password">
                                @if ($errors->has('old_password'))
                                    <div class="alert alert-danger">{{ $errors->first('old_password') }}</div>
                                @endif
                            </label>
                            <hr>
                            <p class="name-input">
                                {{__('site.Password')}}
                            </p>
                            <label class="input-style">
                                <input type="password" name="password">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </label>
                            <p class="name-input">
                                {{__('site.Password confirmation')}}
                            </p>
                            <label class="input-style">
                                <input type="password" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </label>

                            <button class="btn-aaa" type="submit">
                                {{__('site.Update')}}
                            </button>
                            <div class="line-between"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

