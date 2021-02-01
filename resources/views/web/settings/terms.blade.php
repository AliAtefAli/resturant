@extends('web.layouts.app')
@section('title', trans('site.Policies'))
@section('content')

    <div class="about-us">
        <div class="container">
            <h3>
                {{__('site.Policies')}}
            </h3>
            <div class="text my-5">
                <p>
                    @if(isset($setting[app()->getLocale() . '_policies']))
                        {!! $setting[app()->getLocale() . '_policies'] !!}
                    @endif
                </p>
            </div>
        </div>
    </div>

@endsection
