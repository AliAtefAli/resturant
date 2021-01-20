@extends('web.layouts.app')

@section('content')

    <div class="say-us-section complaints-and-suggestions">
        <img class="line" src="images/flower.png">
        <div class="container">
            <h3>
                {{__('site.Complaints')}}
            </h3>
            <form class="cas" action="{{ route('sendComplaint') }}" method="post">
                @csrf
                <label>
                            <span>
                                {{__('site.Name')}}
                            </span>
                    <input type="text" name="name" value="@if(auth()->user()) {{ auth()->user()->name }}@endif">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </label>
                <label>
                            <span>
                                {{__('site.E-mail')}}
                            </span>
                    <input type="email" name="email" value="@if(auth()->user()) {{ auth()->user()->email }}@endif">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                </label>
                <label>
                            <span>
                                {{__('site.Phone')}}
                            </span>
                    <input type="text" name="phone" value="@if(auth()->user()) {{ auth()->user()->phone }}@endif">
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                    @endif
                </label>
                <label>
                            <span>
                                {{__('site.Complaint Subject')}}
                            </span>
                    <input type="text" name="message_subject">
                    @if ($errors->has('message_subject'))
                        <div class="alert alert-danger">{{ $errors->first('message_subject') }}</div>
                    @endif
                </label>
                <label>
                            <span>
                                {{__('site.Complaint Content')}}
                            </span>
                    <textarea name="message"></textarea>
                    @if ($errors->has('message'))
                        <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                    @endif
                </label>
                <input type="submit" value="{{ __('site.Send') }}">
            </form>
        </div>
    </div>
    <!--Start Our Meal-->

    <div class="our-meal">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                من وجباتنا
            </h2>
            <div class="owl-carousel owl-theme our-meal-slider">
                <a href="#" class="item wow fadeInDown"
                   style="background-image: url('images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')"></a>
                <a href="#" class="item wow fadeInDown"
                   style="background-image: url('images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')"></a>
                <a href="#" class="item wow fadeInDown"
                   style="background-image: url('images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')"></a>
                <a href="#" class="item wow fadeInDown"
                   style="background-image: url('images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')"></a>
                <a href="#" class="item wow fadeInDown"
                   style="background-image: url('images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')"></a>
                <a href="#" class="item wow fadeInDown"
                   style="background-image: url('images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')"></a>
                <a href="#" class="item wow fadeInDown"
                   style="background-image: url('images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')"></a>
            </div>
        </div>
    </div>

    <!--End Our Meal-->

@endsection
