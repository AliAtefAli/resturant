@extends('web.layouts.app')

@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection

@section('content')

{{--    <div class="addthis_inline_share_toolbox_20m8" style="display: block"></div>--}}
    <div class="single-product single-product1">
        <img lazy="loading" src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <div class="container">
            <div class="product-slider-img">
                <div class="img-pro">
                    <img lazy="loading"
                        src="@if($product->images->count() > 0){{asset('assets/uploads/products/' . $product->images->first()->path)}} @endif">
                    @if(auth()->check())
                        <a href="{{ route('products.makeFav', $product->id) }}" class="fiv">
                            <i class="fas fa-heart"></i>
                        </a>
                    @endif
                </div>
                <div class="img-pro-contain">
                    @if($product->images->count() > 1)
                        @foreach($product->images as $index => $image)
                            <div class="img-pro img-sper @if($index == 0) active @endif">
                                <img lazy="loading" src="{{asset('assets/uploads/products/' . $image->path)}}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <p class="price">
                <span class="mx-3 text-dark">{{ __('site.Price') }} :</span>
                <span class="product-price" data-value="{{ $product->price }}">{{ $product->price }} </span>
                @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }}
                @endif
            </p>
            <p class="price">
                <span class="mx-3 text-dark">{{ __('site.Total') }} :</span>
                <span id="total" data-value="{{ $product->price }}">{{ $product->price }}  </span>
                @if(isset($setting[app()->getLocale() . '_currency']))
                    {{ $setting[app()->getLocale() . '_currency'] }}
                @endif
            </p>
            <div class="number-of-product-section">

                <form>
                    <div class="container-form">
                        <span class="plus">+</span>
                        <input type="text" name="qty" id="quantity" class="qty" value="1" readonly>
                        <span class="munas">-</span>
                    </div>
                    <p class="text-product">{!! $product->description !!}</p>
                    <button type="submit" class="add-to-cart" data-id="{{ $product->id }}">
                        {{ __('site.Add to cart') }}
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </form>


            </div>
        </div>
    </div>

    <div class="section1">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                {{__('site.Related Products')}}
            </h2>
        </div>
        <div class="section1-container margin-responsive">
            <div class="owl-carousel owl-theme section1-product-slider">
                @foreach($related_products as $product)
                    <a href="{{ route('products.show', $product) }}" class="item wow fadeInDown">
                        <div class="img">
                            <img lazy="loading"
                                src="@if($product->images->count() > 1) {{asset('assets/uploads/products/' . $product->images->first()->path)}} @endif">
                        </div>
                        <div class="info-pro">
                            <span class="name-product">{{$product->name}}</span>
                            <span class="price">
                                    {{ $product->price }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                                </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!--End Section1-->

@endsection
@section('scripts')
    <script type="text/javascript">
        var total = parseFloat($('#total').attr('data-value'))
        $('.plus').on('click', function (e) {
            var price = parseFloat($('.product-price').attr('data-value'));
            total += price;
            document.getElementById('total').innerHTML = total;
        })
        $('.munas').click(function () {
            var price = parseFloat($('.product-price').attr('data-value'));
            if (total > price) {
                total -= price;
                document.getElementById('total').innerHTML = total;
            }
        });

    </script><!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-600947398306150d"></script>
    <script>

        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var id = $(this).attr("data-id");
            var qty = $('#quantity').val();

            $.ajax({
                url: "/products/addToCart/" + id,
                method: "POST",

                data: {
                    _token: '{{ csrf_token() }}',
                    product: id,
                    qty: qty,
                },

                success: function (response) {
                    $("#cart-quantity").text(response.quantity);
                    toastr.success(response.success, {
                        timeOut: "50000",
                    })
                },
                error: function (response) {
                    toastr.warning(response.error, "Progress Bar", {
                        progressBar: !0
                    });
                },
            });
        });
    </script>
@endsection
