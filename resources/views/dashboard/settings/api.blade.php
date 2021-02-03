@extends('dashboard.layouts.app')
@section('title', trans('dashboard.API.APIs'))
@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.API.APIs')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>

                            <li class="breadcrumb-item active">{{ trans('dashboard.API.APIs') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <!-- form start -->
                            <form class="form-horizontal" method="post"
                                  action="{{ route('dashboard.settings.update') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row {{ $errors->has('google_key') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="google_key">{{trans('dashboard.API.Google key')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="google_key" class="form-control"
                                                   name="settings[google_key]"
                                                   value="@if(isset($settings['google_key'])) {{ $settings['google_key'] }} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'google_key'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('payment_api') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="payment_api">{{trans('dashboard.API.Payment api')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="payment_api" class="form-control"
                                                   name="settings[payment_api]"
                                                   value="@if(isset($settings['payment_api'])) {{ $settings['payment_api'] }} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'payment_api'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.main.Edit')}}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
