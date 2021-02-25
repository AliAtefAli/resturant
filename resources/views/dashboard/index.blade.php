@extends('dashboard.layouts.app')
@section('title', trans('dashboard.main.dashboard'))
@section('content')

    <div class="content-wrapper">
        <div class="content-body">
            <section id="icon-section">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="text-uppercase">{{trans('dashboard.main.home')}}</h4>
                        <p>{{trans('dashboard.Dashboard Statistics')}}</p>
                    </div>
                </div>


                <div class="row">
                    @if(auth()->user()->permissions == 'admin')
                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 media-body text-left">
                                            <h5>{{trans('dashboard.product.Products')}}</h5>
                                            <h5 class="text-bold-400 mb-0">{{ $products }}</h5>
                                        </div>
                                        <div class="p-2 text-center bg-warning rounded-right">
                                            <i class="ft-camera font-large-2 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 media-body text-left">
                                            <h5>{{trans('dashboard.user.users')}}</h5>
                                            <h5 class="text-bold-400 mb-0">{{ $users }}</h5>
                                        </div>
                                        <div class="p-2 text-center bg-primary rounded-right">
                                            <i class="ft-user font-large-2 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 media-body text-left">
                                            <h5>{{trans('dashboard.user.admins')}}</h5>
                                            <h5 class="text-bold-400 mb-0">{{ $admins }}</h5>
                                        </div>
                                        <div class="p-2 text-center bg-info rounded-right">
                                            <i class="fa fa-users-cog font-large-2 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 media-body text-left">
                                            <h5>{{trans('dashboard.subscriptions.All Subscriptions')}}</h5>
                                            <h5 class="text-bold-400 mb-0">{{ $subscriptions }}</h5>
                                        </div>
                                        <div class="p-2 text-center bg-danger rounded-right">
                                            <i class="ft-shopping-cart font-large-2 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                        @if(auth()->user()->permissions == 'admin' || auth()->user()->permissions == 'chef' || auth()->user()->permissions == 'delivery')
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="media align-items-stretch">
                                            <div class="p-2 media-body text-left">
                                                <h5>{{trans('dashboard.subscriptions.today_subscriptions')}}</h5>
                                                <h5 class="text-bold-400 mb-0">{{ $today_subscriptions }}</h5>
                                            </div>
                                            <div class="p-2 text-center bg-success rounded-right">
                                                <i class="ft-shopping-cart font-large-2 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="media align-items-stretch">
                                            <div class="p-2 media-body text-left">
                                                <h5>{{trans('dashboard.subscriptions.tomorrow_subscriptions')}}</h5>
                                                <h5 class="text-bold-400 mb-0">{{ $tomorrow_subscriptions }}</h5>
                                            </div>
                                            <div class="p-2 text-center bg-success rounded-right">
                                                <i class="ft-shopping-cart font-large-2 text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                </div>

            </section>
        </div>
    </div>
@endsection

