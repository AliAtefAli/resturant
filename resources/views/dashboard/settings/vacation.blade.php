@extends('dashboard.layouts.app')
@section('title', trans('dashboard.subscriptions.Add vacation'))

@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1>{{  trans('dashboard.main.Settings') }}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.categories.index')}}">{{trans('dashboard.main.Settings')}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.subscriptions.Add vacation') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        @include('dashboard.partials._all_errors')
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

                                <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="start_vacation">{{trans('dashboard.settings.Start of vacation')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="date" id="start_vacation" class="form-control"
                                                   name="settings[start_vacation]"
                                                   value="@if(isset($settings['start_vacation'])){{\Carbon\Carbon::parse($settings['start_vacation'])->toDateString()}}@endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'start_vacation'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="end_vacation">{{trans('dashboard.settings.End of vacation') }}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="date" id="end_vacation" class="form-control"
                                                   name="settings[end_vacation]"
                                                   value="@if(isset($settings['end_vacation'])){{\Carbon\Carbon::parse($settings['end_vacation'])->toDateString()}}@endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'end_vacation'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.settings.Update Settings')}}
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
