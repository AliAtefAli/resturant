@extends('web.layouts.app')
@section('title', trans('site.Subscriptions'))
@section('content')

    @foreach($subscribed_packages as $package)
    <!--Start User-->
    <div id="stop-{{$package->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    @if(app()->getLocale() == 'ar')
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('site.Stop subscription') }}</h4>
                    @else
                        <h4 class="modal-title">{{ trans('site.Stop subscription') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    @endif
                </div>
                <div class="modal-body">
                    <p>{{ trans('site.Do you want to this Stop subscription ?') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('subscriptions.offSubscription', $package->id) }}" type="button" class="btn btn-danger">{{ trans('site.Yes, Stop subscription') }}</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('site.No') }}</button>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    @foreach($subscribed_packages as $package)
    <!--Start User-->
    <div id="run-{{$package->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    @if(app()->getLocale() == 'ar')
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('site.Run subscription') }}</h4>
                    @else
                        <h4 class="modal-title">{{ trans('site.Run subscription') }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    @endif
                </div>
                <div class="modal-body">
                    <p>{{ trans('site.Do you want to this Run subscription ?') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('subscriptions.onSubscription', $package->id) }}" type="button" class="btn btn-success">{{ trans('site.Yes, Restart subscription') }}</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('site.No') }}</button>
                </div>
            </div>

        </div>
    </div>
    @endforeach
    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info" style="min-height: 200px">
            @if($subscribed_packages->count() > 0)
                <p class="pic-p">
                    {{__('site.User Subscriptions')}}
                </p>
                <div class="owl-carousel owl-theme pic-slider @if($subscribed_packages->count() > 2) loop @endif">
                    @foreach($subscribed_packages as $package)
                        <div class="item">
                            <div class="image">
                                <div class="img-image"
                                     style="background-image: url('{{asset('assets/uploads/subscriptions/' . $package->subscription->image )}}')"></div>
                                <div class="over-lay"
                                     style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                            </div>
                            <span class="in">
                                    {{$package->subscription->name}}
                                </span>
                            <div class="list-ul">
                                <ul class="list-unstyled">

                                    <li>
                                        <span></span>
                                        {!! $package->subscription->translate(lang())->products !!}
                                    </li>
                                </ul>
                            </div>
                            <p class="price">
                                {{ $package->billing_total }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                            </p>
                            <p class="shiping">
                                @if($package->shipping_type == 'delivery')
                                    {{ __('site.Delivery') }}
                                    : @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] * $package->subscription->duration_in_day }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
                                @endif
                            </p>
                            <p class="person-number">
                                {{ __('dashboard.subscriptions.Start Date') }} : {{ \Carbon\Carbon::parse($package->start_date)->toDateString() }}
                            </p>
                            <p class="person-number">
                                {{ __('dashboard.subscriptions.End Date') }} : {{ \Carbon\Carbon::parse($package->end_date)->toDateString() }}
                            </p>
                            <p class="person-number">
                                {{ __('site.People count') }} : {{$package->people_count}}
                            </p>

                            <p class="shiping">
                                    {{ __('site.Address') }}
                                    : {{$package->billing_address}}
                            </p>
                            <p class="shiping">
                                @if($package->billing_phone )
                                    {{ __('site.Phone') }}
                                    : {{$package->billing_phone}}
                                @endif
                            </p>

                            <p class="shiping">
                                {{ __('site.Order.payment method') }}
                                : {{ __('site.'. $package->payment_type) }}
                            </p>

                            <p class="shiping">
                                {{ __('dashboard.number_of_pauses') }}
                                : {{  $package->stopped_count }}
                            </p>

                            <p class="shiping">
                                @if($package->note)
                                    {{ __('site.Note') }}
                                    : {{$package->note}}
                                @endif
                            </p>

                            <p class="person-number">
                                {!! $package->subscription->description!!}
                            </p>

                            @if($package->stopped_count == 0 || $package->stopped_count == null)
                                @else
                                @if($package->stopped_at == null)
                                    <button type="button" class="btn  custom-button" data-toggle="modal"
                                            data-target="#stop-{{$package->id}}">
                                        {{ trans('site.Stop subscription') }}
                                        {{--                                {{ ($package->stopped_at) ?? 'no' }}--}}
                                    </button>
                                @else
                                    <button type="button" class="btn  custom-button" data-toggle="modal"
                                            data-target="#run-{{$package->id}}">
                                        {{ trans('site.Run subscription') }}
                                        {{--                                    {{ ($package->stopped_at) ?? 'no' }}--}}
                                    </button>
                                @endif
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            @if($finished_subscribed_packages->count() > 0)
                <p class="pic-p">
                    {{__('site.User Finished Subscriptions')}}
                </p>
                <div class="owl-carousel owl-theme pic2-slider @if($finished_subscribed_packages->count() > 2) loop @endif">
                    @foreach($finished_subscribed_packages as $package)
                        <div class="item">
                            <div class="image">
                                <div class="img-image"
                                     style="background-image: url('{{asset('assets/uploads/subscriptions/' . $package->subscription->image )}}')"></div>
                                <div class="over-lay"
                                     style="background-image: url('{{asset('web_files/images/flo.png')}}')"></div>
                            </div>
                            <span class="in">
                                    {{$package->subscription->name}}
                                </span>
                            <div class="list-ul">
                                <ul class="list-unstyled">
                                    {!! $package->subscription->translate(lang())->products !!}
                                </ul>
                            </div>
                            <p class="price">
                                {{ $package->billing_total }} @if(isset($setting[app()->getLocale() . '_currency'])){{ $setting[app()->getLocale() . '_currency'] }} @endif
                            </p>
                            <p class="shiping">
                                @if($package->shipping_type == 'delivery')
                                    {{ __('site.Delivery') }}
                                    : @if(isset($setting[ 'delivery_price'])) {{ $setting['delivery_price'] * $package->subscription->duration_in_day }} @endif @if(isset($setting[ app()->getLocale() . '_currency'])) {{ $setting[ app()->getLocale() . '_currency'] }} @endif
                                @endif
                            </p>
                            <p class="person-number">
                                {{ __('site.People count') }} : {{$package->people_count}}
                            </p>
                            <p class="person-number">
                                {{ __('dashboard.subscriptions.Start Date') }} : {{ \Carbon\Carbon::parse($package->start_date)->toDateString() }}
                            </p>
                            <p class="person-number">
                                {{ __('dashboard.subscriptions.End Date') }} : {{ \Carbon\Carbon::parse($package->end_date)->toDateString() }}
                            </p>

                            <p class="person-number">
                                {!! $package->subscription->description!!}
                            </p>
{{--                            @if($package->stopped_at != null)--}}
{{--                                <button type="button" class="btn  custom-button" data-toggle="modal" data-target="#run-{{$package->id}}">--}}
{{--                                    {{ trans('site.Run subscription') }}--}}
{{--                                </button>--}}
{{--                            @endif--}}
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    <!--End User-->
    <!--Start Our Meal-->
    @include('web.layouts.our-meals')
    <!--End Our Meal-->

@endsection
