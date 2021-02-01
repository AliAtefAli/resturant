@extends('dashboard.layouts.app')
@section('title', trans('dashboard.slider.Add Slider'))
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1>{{  trans('dashboard.main.Sliders') }}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.sliders.index')}}">{{trans('dashboard.main.Sliders')}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.slider.Add Slider') }}</li>
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
                                  action="{{ route('dashboard.sliders.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('url') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="url">{{ trans('dashboard.slider.Url')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="url" name="url" value="{{ old('url') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('ordered') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="ordered">{{ trans('dashboard.slider.Order')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="number" name="ordered" value="{{ old('ordered') }}" min="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="status">{{ trans('dashboard.slider.Status')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="status">
                                                <option value="pending">{{ trans('dashboard.slider.Pending') }}</option>
                                                <option value="active">{{ trans('dashboard.slider.Active') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="image">{{trans('dashboard.slider.Slider Image')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="file" id="image" class="form-control image img-input"
                                                   name="image"/>
                                            @include('dashboard.partials._errors', ['input' => 'image'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <img src="{{ asset('dashboard_files/app-assets/images/avatar.jpg') }} "
                                             alt="Image" class="img-preview" width="150">
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.main.Create')}}
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
@section('scripts')
    <script src="{{ asset('dashboard_files/assets/js/image-review.js') }}"></script>
@endsection
