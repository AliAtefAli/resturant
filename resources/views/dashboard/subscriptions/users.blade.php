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
                            <li class="breadcrumb-item active">{{trans('dashboard.subscriptions.Users Subscribed')}}</li>
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
                                <div class="row">
                                    @if($users->count() > 1)
                                        @foreach($users as $user)
                                            <div class="col-md-2">
                                                <a href="{{ route('dashboard.users.show', $user) }}">{{ $user->name }}</a>
                                            </div>
                                        @endforeach
                                    @else
                                        {{ trans('dashboard.subscriptions.No Subscribed Users') }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection

