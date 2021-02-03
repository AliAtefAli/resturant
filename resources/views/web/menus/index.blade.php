@extends('web.layouts.app')
@section('title', trans('site.Menu of the week'))
@section('content')


    <!--Start User-->

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <img class="menu-week" src=" @if(isset($setting['menu_of_the_week'])){{ asset('assets/uploads/settings/' . $setting['menu_of_the_week'])  }} @endif">
        </div>
    </div>

    <!--End User-->


    <!--Start Our Meal-->
@include('web.layouts.our-meals')
    <!--End Our Meal-->

@endsection
