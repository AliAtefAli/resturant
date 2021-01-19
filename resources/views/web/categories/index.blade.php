@extends('web.layouts.app')

@section('content')

    <div class="section1 section1-custom1">
            <div class="container">
                <h2 class="header-section wow zoomIn">
                    {{ __('site.Categories') }}
                </h2>
            </div>
            @foreach($categories as $category)
                <div class="section1-container margin-responsive">
                    <h2 class="header-section1 wow zoomIn">
                        <a href="#{{$category->id}}" style="color: inherit; text-decoration: none;">{{ $category->name }}</a>
                    </h2>
                    <div class="owl-carousel owl-theme section1-name-slider m-5">
                        @foreach($category->categories as $sub_category)
                            <a href="{{route('category.index' , $sub_category->id)}}" id="#{{$sub_category->id}}" class="item wow fadeInDown {{ $loop->first ? 'active' : '' }}">
                                <h3>
                                    {{$sub_category->name}}
                                </h3>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
    </div>

@endsection
