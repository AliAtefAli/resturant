@extends('web.layouts.app')
@section('title', trans('site.About us'))
@section('content')

    <div class="about-us">
        <div class="container">
            <h3>
                {{__('site.About us')}}
            </h3>
            <div class="text my-5">
                @if(isset($setting[app()->getLocale() . '_about']))
                    {!! $setting[app()->getLocale() . '_about'] !!}
                @endif
            </div>
        </div>
    </div>

@endsection
