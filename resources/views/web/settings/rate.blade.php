@extends('web.layouts.app')
@section('title', trans('site.The Rate'))
@section('content')

    <!--start rating-->

    <div class="rating">
        <div class="container">
            <form class="pic-select" action="{{ route('save.rate') }}" method="post">
                @csrf
                <h2 class="header-section wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
                    {{ __('site.Rate.Add your rate') }}
                </h2>
                <div>
                    <div class="stars-section d-flex justify-content-center">
                        <input class="star star-5" id="star-5" type="radio" name="amount" value="5" checked/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="amount" value="4"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="amount" value="3"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="amount" value="2"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="amount" value="1"/>
                        <label class="star star-1" for="star-1"></label>

                    </div>
                    @if ($errors->has('amount'))
                        <div class="alert alert-danger">{{ $errors->first('amount') }}</div>
                    @endif
                    <p class="name-input">{{ __('site.Rate.Comment') }}</p>
                </div>

                <label class="input-style">
                    <textarea name="comment"></textarea>
                    @if ($errors->has('comment'))
                        <div class="alert alert-danger">{{ $errors->first('comment') }}</div>
                    @endif
                </label>
                <div class="d-flex justify-content-center">
                    <button class="done" type="submit">{{ __('site.Rate.Rate') }}</button>
                </div>
            </form>
        </div>
    </div>

    <!--End rating-->

@endsection
