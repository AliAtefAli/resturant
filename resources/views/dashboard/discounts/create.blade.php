@extends('dashboard.layouts.app')
@section('title', trans('dashboard.discounts.Add discount'))
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection
@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.discounts.discounts')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard.discounts.index')}}">{{trans('dashboard.discounts.discounts')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.discounts.Add discount') }}</li>
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
                                  action="{{ route('dashboard.discounts.store') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row {{ $errors->has('code') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="code">{{trans('dashboard.discounts.Code')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="code" class="form-control"
                                                   name="code"/>
                                            @include('dashboard.partials._errors', ['input' => 'code'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('amount') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="amount">{{trans('dashboard.discounts.Value')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="float" id="amount" class="form-control"
                                                   name="amount"/>
                                            @include('dashboard.partials._errors', ['input' => 'amount'])
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="start_date">{{trans('dashboard.discounts.Start Date')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="date" id="startDate" class="form-control"
                                                   name="start_date" min="{{\Carbon\Carbon::today()->toDateString()}}" />
                                            @include('dashboard.partials._errors', ['input' => 'start_date'])
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row {{ $errors->has('end_date') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="end_date">{{trans('dashboard.discounts.End Date')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="date" id="endDate" class="form-control"
                                                   name="end_date" min="{{\Carbon\Carbon::today()->toDateString()}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'end_date'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('discount_type') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="discount_type">{{ trans('dashboard.discounts.discount type')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="discount_type">
                                                    <option value="percent">{{ trans('dashboard.discounts.percent') }}</option>
                                                    <option value="fixed">{{ trans('dashboard.discounts.fixed') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="status">{{ trans('dashboard.discounts.Status')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="status">
                                                    <option value="available">{{ trans('dashboard.discounts.available') }}</option>
                                                    <option value="unavailable">{{ trans('dashboard.discounts.unavailable') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.discounts.Add discount')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection
