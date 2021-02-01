@extends('dashboard.layouts.app')

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

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('product_id') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="product_id">{{ trans('dashboard.discounts.product')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="product_id">
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
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
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#password, #password_confirmation').on('keyup', function () {
                if ($('#password').val() == $('#password_confirmation').val()) {
                    $('#message').html("{{trans('matching')}}").css('color', 'green');
                } else
                    $('#message').html("{{trans('not_matching')}}").css('color', 'red');
            });
        });
    </script>
@endsection
