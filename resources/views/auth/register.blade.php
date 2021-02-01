@extends('web.layouts.app')

@section('content')

    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form method="POST" action="{{ route('register') }}" class="form-pic-select">
            @csrf
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-page">
                        {{__('site.Register')}}
                    </p>
                    <p class="name-input">
                        {{__('site.Name')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="name" value="{{ old('name') }}">
                    </label>
                    @if ($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                    <p class="name-input">
                        {{__('site.Phone')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="phone" value="{{ old('phone') }}">
                        @if ($errors->has('phone'))
                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </label>
                    <p class="name-input">
                        {{__('site.E-mail')}}
                    </p>
                    <label class="input-style">
                        <input type="email" name="email" value="{{ old('email') }}">
                    </label>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
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

                    <p class="name-input">
                        {{__('site.Address')}}
                    </p>
                    <label class="input-style">
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="search-input">
                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                        <input type="hidden" id="lat" name="lat" value="{{ old('lat') }}">
                        <input type="hidden" id="lng" name="lng" value="{{ old('lng') }}">
                    </label>
                    @if ($errors->has('address'))
                        <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                    @endif

                    <div class="">
                        <a href="#" class="link-forget" data-toggle="modal" data-target="#policies">
                            {{__('site.Policies')}}
                        </a>
                    </div>
                    <button class="btn-aaa" type="submit">
                        {{__('site.Register')}}
                    </button>
                    <div class="line-between"></div>
                </div>
            </div>
        </form>
        <a href="{{route('login')}}" class="btn-aaa" type="submit">
            {{__('site.Login')}}
        </a>
    </div>
@endsection

{{--Policies pop up modal  --}}
<div class="modal fade" id="policies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{__('site.Policies')}}</h5>
                <button type="button" class="close"  @if(lang() == 'ar') style="margin-right:260px" @endif  data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(isset($setting[app()->getLocale() . '_policies']))
                    {!! $setting[app()->getLocale() . '_policies'] !!}
                @endif
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

@section('scripts')
    @include('partials.google-map', ['lat' => ($setting['lat']) ?? 28.44249902816536, 'lng' => ( $setting['lng']) ?? 36.48057637720706])
@endsection
