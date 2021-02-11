<div class="our-meal">
    <div class="container">
        <h2 class="header-section wow zoomIn">{{ __('site.Our Meals') }}</h2>
        <div class="owl-carousel owl-theme our-meal-slider @if($featured_products->count() > 4) loop @endif">
            @foreach($featured_products as $product)
                <a lazy="loading" href="{{ route('products.show', $product) }}" class="item wow fadeInDown"
                   style="background-image: url(@if($product->images->count() > 0){{ asset('assets/uploads/products/' . $product->images->first()->path ) }} @endif)"></a>
            @endforeach
        </div>
    </div>
</div>
