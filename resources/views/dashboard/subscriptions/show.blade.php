@extends('dashboard.layouts.app')
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">{{trans('dashboard.subscriptions.Subscriptions')}}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.subscriptions.index') }}">{{trans('dashboard.subscriptions.Subscriptions')}}
                                </a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.subscriptions.show')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of content header -->

        <section id="description" class="card">
            <div class="card-content">
                <div class="card-body">
                    <!-- HTML5 export buttons table -->
                    <section id="dom">
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ trans('dashboard.subscriptions.name') }}</th>
                                        <td>{{ $subscription->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('dashboard.subscriptions.description') }}</th>
                                        <td>{!! $subscription->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('dashboard.subscriptions.Price') }}</th>
                                        <td>{{ $subscription->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('dashboard.subscriptions.products') }}</th>
                                        <td>@foreach($subscription->products as $product)
                                                {{ $product->name }},
                                            @endforeach
                                        </td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
@endsection
