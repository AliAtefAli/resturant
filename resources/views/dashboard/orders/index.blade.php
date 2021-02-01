@extends('dashboard.layouts.app')
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">{{trans('dashboard.main.orders')}}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{trans('home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.main.orders')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of content header -->

        <!--content body -->
        <div class="content-body">
            <!-- Description -->
            <section id="description" class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- HTML5 export buttons table -->
                        <section id="dom">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <table class="table table-striped table-bordered dataex-html5-export">
                                                    <thead>
                                                    <tr>
                                                        <th>{{trans('dashboard.order.Order ID')}}</th>
                                                        <th>{{trans('dashboard.order.payment status')}}</th>
                                                        <th>{{trans('dashboard.order.payment method')}}</th>
                                                        <th>{{trans('dashboard.order.Order date')}}</th>
                                                        <th>{{trans('dashboard.order.address')}}</th>
                                                        <th>{{trans('dashboard.main.status')}}</th>
                                                        <th>{{trans('dashboard.order.Total Price')}}</th>
                                                        <th>{{ trans('dashboard.main.Actions') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>#{{ $order->id }}</td>
                                                            <td>{{ $order->payment_status }}</td>

                                                            <td>{{ $order->payment_method }}</td>
                                                            <td>{{ ( $order->created_at) ? $order->created_at->diffForHumans()  : '' }}</td>
                                                            <td>{{ $order->billing_address }}</td>
                                                            <td>{{ $order->order_status }}</td>
                                                            <td>{{ $order->billing_total }}</td>
                                                            @if($order->order_status !=  'delivered')
                                                                <td>
                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="btn-group mr-1 mb-1">
                                                                            <button type="button"
                                                                                    class="btn btn-success btn-sm dropdown-toggle"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                                <i class="la la-ellipsis-v"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu arrow">

                                                                                @if($order->order_status !=  'delivered')

                                                                                    <a href="{{ route('dashboard.orders.accepted', $order) }}">
                                                                                        <button class="btn btn-info  dropdown-item"
                                                                                                title="{{ trans('dashboard.order.Make as In Progress') }}">
                                                                                            {{ trans('dashboard.order.Make as In Progress') }}</button>
                                                                                    </a>
                                                                                    <a href="{{ route('dashboard.orders.delivered', $order) }}">
                                                                                        <button class="btn btn-primary  dropdown-item"
                                                                                                title="{{ trans('dashboard.order.Make as shipped') }}">
                                                                                            {{ trans('dashboard.order.Make as shipped') }}</button>
                                                                                    </a>
                                                                                    <a href="{{ route('dashboard.orders.rejected', $order) }}">
                                                                                        <button class="btn btn-danger  dropdown-item"
                                                                                                title="{{ trans('dashboard.order.Make as Rejected') }}">
                                                                                            {{ trans('dashboard.order.Make as Rejected') }}</button>
                                                                                    </a>
                                                                                @elseif($order->order_status ==  'processing')

                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--/ HTML5 export buttons table -->
                    </div>
                </div>
            </section>
            <!--/ Description -->
        </div>
        <!--end of content body -->
    </div>
    <!--end of content wrapper -->

@endsection
