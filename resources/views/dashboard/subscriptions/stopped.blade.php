@extends('dashboard.layouts.app')
@section('title', trans('dashboard.subscriptions.stopped_subscriptions'))
@section('styles')
    @if(app()->getLocale() == 'ar')
        <style>
            .dataTables_wrapper .row {
                min-height: 55px;
            }

            div.dataTables_wrapper div.dataTables_filter {
                text-align: left;
                position: absolute;
                left: 300px;
                bottom: 10px;
                z-index: 3;
            }

            #table_length {
                z-index: 2;
                position: absolute;
                /*right: 865px;*/
                /*bottom: 15px;*/
            }
            .card-body
            {
                padding: 0; !important;
            }
        </style>
        @else
        <style>
            .card-body
            {
                padding: 0; !important;
            }
        </style>
    @endif
    <style>
        .table th, .table td {
            padding: 0.75rem 1rem;
        }
        .dropdown-menu {
            right: inherit;
        }
    </style>
@endsection
@section('content')

    <!--content wrapper -->
    <div style="padding: 10px" class="content-wrapper">
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
                            <li class="breadcrumb-item active">{{trans('dashboard.subscriptions.stopped_subscriptions')}}
                                <span class="badge badge badge-primary">{{ $subscriptions->count() }}</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>



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
                                            <div class="card-body card-dashboard" style="overflow: auto">
                                                <table class="table table-striped table-bordered text-cente"
                                                       style="font-size: xx-small;">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.user.Name')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.Start Date')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.End Date')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.Shipping type')}}</th>
                                                        @if(auth()->user()->permissions == 'admin')
                                                            <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.Total Price')}}</th>
                                                        @endif
                                                        <th style="width: 80px;!important;">{{trans('dashboard.subscriptions.Address')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.detailed_address')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.People count')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.name')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.Note')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.order_status')}}</th>
                                                        <th>{{trans('dashboard.main.Actions')}}</th>
                                                        @if(auth()->user()->permissions == 'admin')
                                                            <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.status')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($subscriptions as $index => $subscription)
                                                        <tr>
                                                            <th>{{ $index + 1 }}</th>
                                                            <th>
                                                                <a href="{{ route('dashboard.users.show', $subscription->user->id) }}">{{ $subscription->user->name }}</a>
                                                            </th>
                                                            <td>{{ \Carbon\Carbon::parse($subscription->start_date)->toDateString() }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($subscription->end_date)->toDateString() }}</td>
                                                            <td>{{ trans("dashboard.subscriptions." . $subscription->shipping_type) }}</td>
                                                            @if(auth()->user()->permissions == 'admin')
                                                                <td>{{ $subscription->billing_total }}</td>
                                                            @endif
                                                            <td style="width: 80px;!important;"><a
                                                                        href="{{ 'https://www.google.com/maps/place/' . $subscription->billing_address }}"
                                                                        target="_blank">
                                                                    {{ $subscription->billing_address }}
                                                                </a>
                                                            </td>
                                                            <td>{{ $subscription->detailed_address }}</td>
                                                            <td>{{ $subscription->people_count }}</td>
                                                            <td>{{ $subscription->subscription->name }}</td>
                                                            <td>{{ $subscription->note }}</td>
                                                            <td>{{ trans("dashboard.subscriptions." . $subscription->status) }}</td>
                                                            <td>
                                                                @if(auth()->user()->permissions == 'admin' || auth()->user()->permissions == 'chef')
                                                                    <a href="#" class="btn btn-info btn-sm"
                                                                       title="{{ trans('dashboard.subscriptions.add_notes') }}"
                                                                       style="padding: 5px 8px;" data-toggle="modal"
                                                                       data-target="#notes-{{$subscription->id}}">
                                                                        <i class="ft-message-square"></i>
                                                                    </a>
                                                                @endif
                                                                <a href="{{ route('dashboard.subscriptions.showSubscription', $subscription) }}"
                                                                   class="btn btn-warning btn-sm"
                                                                   style="padding: 5px 8px;"
                                                                   title="{{ trans('dashboard.subscriptions.Show Subscriptions') }}">
                                                                    <i class="ft-eye"></i>
                                                                </a>
                                                            </td>
                                                            @if(auth()->user()->permissions == 'admin')
                                                                <td>
                                                                    @if($subscription->status ==  'processing'  || $subscription->status ==  'accepted')
                                                                        <div class="btn-group">
                                                                            <button type="button"
                                                                                    class="btn btn-success btn-sm dropdown-toggle"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                            </button>
                                                                            <div class="dropdown-menu arrow">
                                                                                @if($subscription->status ==  'accepted')
                                                                                    <a href="{{ route('dashboard.subscriptions.delivered', $subscription) }}">
                                                                                        <button
                                                                                                class="btn btn-primary  dropdown-item"
                                                                                                title="{{ trans('dashboard.subscriptions.Make as shipped') }}">
                                                                                            {{ trans('dashboard.subscriptions.Make as shipped') }}</button>
                                                                                    </a>
                                                                                @elseif($subscription->status ==  'processing')
                                                                                    <a href="{{ route('dashboard.subscriptions.accepted', $subscription) }}">
                                                                                        <button
                                                                                                class="btn btn-info  dropdown-item"
                                                                                                title="{{ trans('dashboard.subscriptions.Make as In Progress') }}">
                                                                                            {{ trans('dashboard.subscriptions.Make as In Progress') }}</button>
                                                                                    </a>
                                                                                    <a href="{{ route('dashboard.subscriptions.rejected', $subscription) }}">
                                                                                        <button
                                                                                                class="btn btn-danger  dropdown-item"
                                                                                                title="{{ trans('dashboard.subscriptions.Make as Rejected') }}">
                                                                                            {{ trans('dashboard.subscriptions.Make as Rejected') }}</button>
                                                                                    </a>
                                                                                @else
                                                                                    <a href="{{ route('dashboard.subscriptions.delivered', $subscription) }}">
                                                                                        <button
                                                                                                class="btn btn-primary  dropdown-item"
                                                                                                title="{{ trans('dashboard.subscriptions.Make as shipped') }}">
                                                                                            {{ trans('dashboard.subscriptions.Make as shipped') }}</button>
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            @endif
                                                        </tr>
                                                        @include('dashboard.subscriptions.note_modal')
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
    </div>
@endsection
@section('scripts')
    @include('dashboard.subscriptions.datatable')
@endsection

