<div class="our-meal">
    <div class="container">
        <h2 class="header-section wow zoomIn">{{ __('site.Our Meals') }}</h2>
        <div class="owl-carousel owl-theme our-meal-slider">
            @foreach($our_meals as $meal)
                <a lazy="loading" href="" class="item wow fadeInDown" style="background-image: url({{ asset('assets/uploads/meals/' . $meal->image ) }}"></a>
            @endforeach
        </div>
    </div>
</div>
