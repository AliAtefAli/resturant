@extends('web.layouts.app')
@section('title', trans('site.Who are we'))
@section('content')

    <div class="about-us">
        <div class="container">
            <h3>
                {{__('site.Who are we')}}
            </h3>
            <div class="text my-5">
                <p>
                    @if(isset($setting[app()->getLocale() . '_who_are_we']))
                        {!! $setting[app()->getLocale() . '_who_are_we'] !!}
                    @endif
                </p>
            </div>
        </div>
    </div>

@endsection
