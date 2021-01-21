@extends('dashboard.layouts.app')
@section('content')

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
                            <li class="breadcrumb-item">{{ trans('dashboard.main.Create') }}</li>
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
                            <form class="form-horizontal" method="post" action="{{ route('dashboard.users.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="name">{{trans('dashboard.user.Name')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="name" class="form-control"
                                                       placeholder="{{trans('dashboard.user.Name')}}"
                                                       name="name" value="{{old('name')}}"/>
                                                @include('dashboard.partials._errors', ['input' => 'name'])
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="name">{{trans('dashboard.user.Email')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="email" class="form-control"
                                                       placeholder="{{trans('email')}}"
                                                       name="email" value="{{old('email')}}"/>
                                                @include('dashboard.partials._errors', ['input' => 'email'])
                                                <div class="form-control-position">
                                                    <i class="ft-mail"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="phone-mask">{{trans('dashboard.user.phone')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+966</span>
                                                    </div>
                                                    <input type="text" class="form-control phone-inputmask"
                                                           id="phone-mask"
                                                           placeholder="Enter Phone Number" name="phone"
                                                           value="{{ old('phone') }}"/>
                                                </div>
                                                @include('dashboard.partials._errors', ['input' => 'phone'])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="password">{{trans('dashboard.user.Password')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="password" id="password" class="form-control"
                                                       placeholder="{{trans('dashboard.user.Password')}}"
                                                       name="password"/>
                                                @include('dashboard.partials._errors', ['input' => 'password'])
                                                <div class="form-control-position">
                                                    <i class="ft-hash"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="password_confirmation">{{trans('dashboard.user.Confirm Password')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="password" id="password_confirmation" class="form-control"
                                                       placeholder="{{trans('dashboard.user.Confirm Password')}}"
                                                       name="password_confirmation"/>
                                                @include('dashboard.partials._errors', ['input' => 'password_confirmation'])
                                                <div class="form-control-position">
                                                    <i class="ft-hash"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="image">{{trans('dashboard.user.Image')}}</label>
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
                                            <img src="{{ asset('web_files/images/person.png') }}"
                                                 alt="Image" class="img-preview" width="150">
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('type') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="type">{{trans('dashboard.user.Select User Role')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <select class="custom-select" name="type">
                                                    <option value="user">{{ trans('dashboard.user.User') }}</option>
                                                    <option value="admin">{{ trans('dashboard.user.admin') }}</option>
                                                </select>
                                                @include('dashboard.partials._errors', ['input' => 'type'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="status">{{trans('dashboard.user.Select User Status')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <select class="custom-select" name="status">
                                                    <option value="active">{{ trans('dashboard.user.Active') }}</option>
                                                    <option
                                                        value="pending">{{ trans('dashboard.user.Pending') }}</option>
                                                    <option value="block">{{ trans('dashboard.user.Block') }}</option>
                                                </select>
                                                @include('dashboard.partials._errors', ['input' => 'status'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-2">{{ __('dashboard.user.address') }}</div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="address"
                                                   value="{{ old('address') }}"
                                                   id="search-input">
                                            <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                            <input type="hidden" id="lat" name="lat"
                                                   value="{{ old('lat') }}">
                                            <input type="hidden" id="lng" name="lng"
                                                   value="{{ old('lng') }}">
                                            @include('dashboard.partials._errors', ['input' => 'address'])
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.main.Create')}}
                                    </button>
                                </div>
                            </form>
                            <!-- form end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endsection
@section('scripts')
    <script
        src="{{ asset('dashboard_files/app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/extended/form-inputmask.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/assets/js/image-review.js') }}"></script>
    @include('partials.google-map', ['lat' => ($setting['lat']) ?? 28.44249902816536, 'lng' => ( $setting['lng']) ?? 36.48057637720706])
@endsection
