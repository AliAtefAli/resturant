@extends('dashboard.layouts.app')
@section('title', trans('site.Subscriptions'))
@section('content')
    <style>
        .subscribeBtns{
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .subBtns{
            width: 200px;
            height: 35px;
            background-color: #28D094;
            border: 1px solid #28D094;
            border-radius: 5px;
            color: #fff;
            transition: .5s all ease;
        }
        .subBtns:hover{
            background-color: #fff;
            color: #28D094 ;
        }
        .supInfo{
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-direction: column;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 2px 2px 4px #ccc;
            padding: 5px;
        }
        .supInfo img{
            width: 200px;
            margin: 5px;
        }
    </style>

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1>{{  trans('dashboard.main.Users') }}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a></li>
                            <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.users.index')}}">{{ trans('dashboard.main.Users') }}</a>
                            </li>
                            <li class="breadcrumb-item">{{ trans('dashboard.user.edit user') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="height: 300px;">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <div class="subscribeBtns">
                                    @foreach($subscriptions as $subscription)
                                        <div class="supInfo">
                                            <img src="{{ asset('assets/uploads/subscriptions/' . $subscription->image) }}" alt="subscribe image">
                                            <a href="{{route('dashboard.user.userSubscribe', [$user,$subscription])}}">
                                                <button class="subBtns" >
                                                    {{$subscription->name}}
                                                </button>
                                            </a>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection