@extends('web.layouts.app')
{{--<!--Start Loading-->--}}
{{--<div class="loading">--}}
{{--    <div>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!--End Loading-->--}}
@section('title', trans('site.Subscriptions'))
@section('content')


    <!--Start Pace-->
    <div class="pace-section">
        <img lazy="loading" src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <div class="container">
            <h2 class="header-section wow zoomIn">
                {{__('dashboard.subscriptions.Subscriptions')}}
            </h2>
            <div class="show-way">
                {{__('site.Show style')}}
                <span class="mulet"><img lazy="loading" src="{{asset('web_files/images/mult.png')}}"></span>
                <span class="single"><img lazy="loading" src="{{asset('web_files/images/single.png')}}"></span>
            </div>
            <div class="pace-items">
                <div class="row justify-content-center">
                    @foreach($subscriptions as $subscription)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{route('subscriptions.show', $subscription)}}" class="pace-item wow fadeInDown">
                                <div class="img-container">
                                    <div class="img"
                                         style="background-image: url({{ asset('assets/uploads/subscriptions/' . $subscription->image) }});"></div>
                                    <div class="img-overlay"
                                         style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                                </div>
                                <h3>
                                    {{$subscription->name}}
                                </h3>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--End Pace-->

@endsection
