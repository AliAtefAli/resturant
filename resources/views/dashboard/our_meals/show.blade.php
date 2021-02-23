@extends('dashboard.layouts.app')
@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.meals.show')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.meals.index')}}">{{trans('dashboard.our_meals')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.meals.show')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of content header -->

        <!--content body -->
        <div class="content-body">
            <section id="description" class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('dashboard.complaints.content') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text row form-group">
                            <p style="margin-left: 10px"><b>{{ trans('dashboard.meals.name') }}</b></p>
                            :
                            <p style="margin-right: 10px">{{ $meals->name }}</p>
                        </div>
                        <div class="card-text row form-group">
                            <p style="margin-left: 10px"><b>{{ trans('dashboard.meals.image') }}</b></p>
                            :
                            <img  style="margin-right: 10px" src="{{ asset('assets/uploads/meals/' . $meals->image) }}"
                                 alt="Image" class="img-preview" width="150">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
