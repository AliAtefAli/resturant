@extends('dashboard.layouts.app')
@section('title', trans('dashboard.user.edit user'))
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
                            <li class="breadcrumb-item">{{ trans('dashboard.user.edit user') }}</li>
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
                                  action="{{ route('dashboard.users.update', $user) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="name">{{trans('dashboard.user.Name')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="name" class="form-control"
                                                       placeholder="{{trans('dashboard.user.Name')}}"
                                                       name="name" value="{{$user->name}}"/>
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
                                                       name="email" value="{{ $user->email }}"/>
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
                                                    <input type="text" class="form-control"
                                                           id="phone-mask"
                                                           placeholder="Enter Phone Number" name="phone"
                                                           value="{{ $user->phone }}"/>
                                                </div>
                                                @include('dashboard.partials._errors', ['input' => 'phone'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('type') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="type">{{trans('dashboard.user.Select User Role')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <select class="custom-select" name="type">
                                                    <option value="user"
                                                            @if($user->type == 'user') selected @endif>{{ trans('dashboard.user.User') }}</option>
                                                    <option value="admin"
                                                            @if($user->type == 'admin') selected @endif>{{ trans('dashboard.user.admin') }}</option>
                                                </select>
                                                @include('dashboard.partials._errors', ['input' => 'type'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('permissions') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="type">{{trans('dashboard.user.permissions')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <select class="custom-select" name="permissions">
                                                    <option value=""  @if($user->permissions == null) selected @endif></option>
                                                    <option value="admin" @if($user->permissions == 'admin') selected @endif>{{ trans('dashboard.user.admin') }}</option>
                                                    <option value="chef" @if($user->permissions == 'chef') selected @endif>{{ trans('dashboard.user.chef') }}</option>
                                                    <option value="delivery" @if($user->permissions == 'delivery') selected @endif>{{ trans('dashboard.user.delivery') }}</option>
                                                </select>
                                                @include('dashboard.partials._errors', ['input' => 'permissions'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="status">{{trans('dashboard.user.Select User Status')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <select class="custom-select" name="status">
                                                    <option value="active"
                                                            @if($user->status == 'active') selected @endif>{{ trans('dashboard.user.Active') }}</option>
                                                    <option value="pending"
                                                            @if($user->status == 'pending') selected @endif>{{ trans('dashboard.user.Pending') }}</option>
                                                    <option value="block"
                                                            @if($user->status == 'block') selected @endif>{{ trans('dashboard.user.Block') }}</option>
                                                </select>
                                                @include('dashboard.partials._errors', ['input' => 'status'])
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-2">{{ __('dashboard.user.address') }}</div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="address"
                                               value="{{ $user->address }}"
                                               id="search-input">
                                        <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                        <input type="hidden" id="lat" name="lat"
                                               value="{{ $user->lat }}">
                                        <input type="hidden" id="lng" name="lng"
                                               value="{{ $user->lng }}">
                                        @include('dashboard.partials._errors', ['input' => 'address'])
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.main.Edit')}}
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
    @include('partials.google-map', ['lat' => ($user->lat) ?? 28.44249902816536, 'lng' => ( $user->lat) ?? 36.48057637720706])
@endsection
