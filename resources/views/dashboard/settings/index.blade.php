@extends('dashboard.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
@endsection

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
                            <li class="breadcrumb-item active">{{ trans('dashboard.settings.Edit Category') }}</li>
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
                                  action="{{ route('dashboard.setting.updateGeneral', $setting) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="name">{{trans('dashboard.main.email')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="email" class="form-control"
                                                   name="email" value="{{$setting->email}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'email'])
                                            <div class="form-control-position">
                                                <i class="ft-mail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="phone-mask">{{trans('dashboard.settings.Phone Number')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">+966</span>
                                                </div>
                                                <input type="text" class="form-control phone-inputmask" id="phone-mask"
                                                       placeholder="Enter Phone Number" name="phone"
                                                       value="{{$setting->phone}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="name">{{ trans('dashboard.main.Name In '.$language)}}</label>
                                            <div class="col-md-10">
                                                <div><input type="text" id="name" class="form-control"
                                                            name="{{$key}}[name]"
                                                            value="{{ $setting->translate($key)->name }}"/>
                                                    @include('dashboard.partials._errors', ['input' => 'name'])
                                                    <div class="form-control-position">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.description">{{ trans('dashboard.settings.Site Description ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="{{$key}}.description" type="hidden"
                                                       name="{{$key}}[description]"
                                                       value="{{ $setting->translate($key)->description }}">
                                                <trix-editor input="{{$key}}.description"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'description'])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.about">{{ trans('dashboard.settings.Site About ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="{{$key}}.about" type="hidden"
                                                       name="{{$key}}[about]"
                                                       value="{{ $setting->translate($key)->about }}">
                                                <trix-editor input="{{$key}}.about"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'about'])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('policies') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.policies">{{ trans('dashboard.settings.Site Policies ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="{{$key}}.policies" type="hidden" name="{{$key}}[policies]"
                                                       value="{{ $setting->translate($key)->policies }}">
                                                <trix-editor input="{{$key}}.policies"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'policies'])
                                                <div class="form-control-position"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('currency') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.currency">{{ trans('dashboard.settings.Site Currency ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <div class="position-relative">
                                                    <input type="text" id="currency" class="form-control"
                                                           name="{{$key}}[currency]"
                                                           value="{{  $setting->translate($key)->currency }}"/>
                                                    @include('dashboard.partials._errors', ['input' => 'currency'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-group row {{ $errors->has('logo') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="logo">{{trans('dashboard.settings.Site Logo')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="file" id="logo" class="form-control image img-input"
                                                   name="logo"/>
                                            @include('dashboard.partials._errors', ['input' => 'logo'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">
                                        <img src="{{ asset('assets/uploads/settings/' . $setting->logo) }} "
                                             alt="Image" class="img-preview" width="150">
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('delivery_price') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="delivery_price">{{trans('dashboard.settings.Delivery price')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="float" id="delivery_price" class="form-control"
                                                   name="delivery_price" value="{{  $setting->delivery_price }}"/>
                                            @include('dashboard.partials._errors', ['input' => 'delivery_price'])
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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
    <script
        src="{{ asset('dashboard_files/app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/extended/form-inputmask.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/assets/js/image-review.js') }}"></script>
@endsection
