@extends('web.layouts.app')
@section('title', trans('site.Edit'))
@section('content')

    <!--Start User-->

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <div class="img-user">
                <form method="POST" action="{{ route('update.profile', auth()->user()) }}" class="form-pic-select" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="imgg">
                        <i class="fas fa-pencil-alt"></i>
                        <input id="img-user" type="file" name="image" class="img-input">
                        <img src="@if(auth()->user()->image) {{ asset('assets/uploads/users/' . auth()->user()->image) }} @else {{ asset('web_files/images/person.png') }}  @endif"
                             class="img-preview">
                    </div>
                    <div class="container">
                        <div class="pic-select pic-select-auth">
                            <p class="name-input">
                                {{__('site.Name')}}
                            </p>
                            <label class="input-style">
                                <input type="text" name="name" value="{{ auth()->user()->name }}">
                            </label>
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                            <p class="name-input">
                                {{__('site.Phone')}}
                            </p>
                            <label class="input-style">
                                <input type="text" name="phone" value="{{ auth()->user()->phone }}">
                                @if ($errors->has('phone'))
                                    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </label>
                            <p class="name-input">
                                {{__('site.E-mail')}}
                            </p>
                            <label class="input-style">
                                <input type="email" name="email" value="{{ auth()->user()->email }}">
                            </label>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif

                            <p class="name-input">
                                {{__('site.Address')}}
                            </p>
                            <label class="input-style">
                                <input type="text" class="form-control" name="address"
                                       value="{{ auth()->user()->address }}" id="search-input">
                                <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                <input type="hidden" id="lat" name="lat" value="{{ auth()->user()->lat }}">
                                <input type="hidden" id="lng" name="lng" value="{{ auth()->user()->lng }}">
                            </label>
                            @if ($errors->has('address'))
                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                            @endif


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

    <!--End User-->
    <!--Start Our Meal-->
    @include('web.layouts.our-meals')
    <!--End Our Meal-->

@endsection
@section('scripts')
    <script src="{{ asset('dashboard_files/assets/js/image-review.js') }}"></script>
    @include('partials.google-map', ['lat' => auth()->user()->lat, 'lng' => auth()->user()->lng])
@endsection

