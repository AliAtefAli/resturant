@extends('web.layouts.app')
@section('title', trans('site.Menu of the week'))
@section("style")
    <style>
        .customButton{
            width: 250px;
            height: 75px;
            margin-right: auto;
            margin-left: auto;
            display: block;
            margin-top: 40px;
            background-color: #cc5641;
            color: #fff;
            padding: 10px;
            font-weight: 700;
            font-size: 18px;
            transition: all .7s;
            border: 1px solid #cc5641;
            box-shadow: 2px 2px 4px #ddd;
        }
        .customButton:hover{
            background-color: #fff;
            color: #cc5641 !important;
        }
    </style>
@endsection
@section('content')


    <!--Start User-->

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <img class="menu-week" src=" @if(isset($setting['menu_of_the_week'])){{ asset('assets/uploads/settings/' . $setting['menu_of_the_week'])  }} @endif">

            <a href="{{ route('subscriptions.index') }}">
                <button class="customButton" type="submit">
                    {{__('site.Submit Now')}}
                </button>
            </a>
        </div>
    </div>
    <!--End User-->


    <!--Start Our Meal-->
@include('web.layouts.our-meals')
    <!--End Our Meal-->

@endsection
