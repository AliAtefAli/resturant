<div class="our-meal">
    <div class="container">
        <h2 class="header-section wow zoomIn">{{ __('site.Our Meals') }}</h2>
        <div class="owl-carousel owl-theme our-meal-slider @if($our_meals->count() > 4) loop @endif">
            @foreach($our_meals as $meal)
                <a lazy="loading" href="" class="item wow fadeInDown"
                   style="background-image: url(@if($meal->count() > 0){{ asset('assets/uploads/meals/' . $meal->image ) }} @endif" title="{{$meal->name}}"></a>
            @endforeach
        </div>
    </div>
</div>
