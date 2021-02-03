@extends('web.layouts.app')
@section('title', trans('site.Subscriptions'))
@section('content')

    <!--Start User-->

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <p class="pic-p">
                {{__('site.User Subscriptions')}}
            </p>

            <div class="owl-carousel owl-theme pic-slider">
                @foreach($subscribed_packages as $package)
                    <div class="item">
                        <div class="image">
                            <div class="img-image" style="background-image: url('{{asset('web_files/images/item.jpg')}}')"></div>
                            <div class="over-lay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                        </div>
                        <span class="in">
                                    {{$package->name}}
                                </span>
                        <div class="list-ul">
                            <ul class="list-unstyled">
                                @foreach($package->products as $product)
                                <li>
                                    <span></span>
                                        {{$product->name}}
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <p class="price">
                            {{ $package->pivot->billing_total }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                        </p>
                        <p class="shiping">
                            {{ __('site.Delivery') }}:  @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif                        </p>
                        <p class="person-number">
                            {{ __('site.People count') }} : {{$package->pivot->people_count}}
                        </p>

                        @foreach($package->products as $product)
                            <p class="text">
                                {!! $product->description!!}
                            </p>
                        @endforeach

                    </div>
                @endforeach
            </div>

            <p class="pic-p">
                {{__('site.User Finished Subscriptions')}}
            </p>

            <div class="owl-carousel owl-theme pic-slider">
                @foreach($finished_subscribed_packages as $package)
                    <div class="item">
                        <div class="image">
                            <div class="img-image" style="background-image: url('{{asset('web_files/images/item.jpg')}}')"></div>
                            <div class="over-lay" style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                        </div>
                        <span class="in">
                                    {{$package->name}}
                                </span>
                        <div class="list-ul">
                            <ul class="list-unstyled">
                                @foreach($package->products as $product)
                                    <li>
                                        <span></span>
                                        {{$product->name}}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <p class="price">
                            {{ $package->pivot->billing_total }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                        </p>
                        <p class="shiping">
                            {{ __('site.Delivery') }}:  @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif                        </p>
                        <p class="person-number">
                            {{ __('site.People count') }} : {{$package->pivot->people_count}}
                        </p>

                        @foreach($package->products as $product)
                            <p class="text">
                                {!! $product->description!!}
                            </p>
                        @endforeach

                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!--End User-->
    <!--Start Our Meal-->
    @include('web.layouts.our-meals')
    <!--End Our Meal-->

@endsection
