@extends('dashboard.layouts.app')
@section('title', trans('dashboard.smtp.smtp'))
@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.smtp.smtpMail')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>

                            <li class="breadcrumb-item active">{{ trans('dashboard.smtp.smtp') }}</li>
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
                                  action="{{ route('dashboard.settings.smtp') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="google_key">{{trans('dashboard.smtp.username')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="smtp_username" class="form-control"
                                                   name="smtp_username"
                                                   value="{{isset($smtp->username)?$smtp->username:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'username'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="google_key">{{trans('dashboard.smtp.password')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="smtp_password" class="form-control"
                                                   name="smtp_password"
                                                   value="{{isset($smtp->password)?$smtp->password:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'password'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('sender_email') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="google_key">{{trans('dashboard.smtp.sender_email')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="smtp_sender_email" class="form-control"
                                                   name="smtp_sender_email"
                                                   value="{{isset($smtp->sender_email)?$smtp->sender_email:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'sender_email'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('sender_name') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="google_key">{{trans('dashboard.smtp.sender_name')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="smtp_sender_name" class="form-control"
                                                   name="smtp_sender_name"
                                                   value="{{isset($smtp->sender_name)?$smtp->sender_name:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'sender_name'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('port') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="google_key">{{trans('dashboard.smtp.port')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="smtp_port" class="form-control"
                                                   name="smtp_port"
                                                   value="{{isset($smtp->port)?$smtp->port:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'port'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('host') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="google_key">{{trans('dashboard.smtp.host')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="smtp_host" class="form-control"
                                                   name="smtp_host"
                                                   value="{{isset($smtp->host)?$smtp->host:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'host'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('encryption') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="payment_api">{{trans('dashboard.smtp.encryption')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="smtp_encryption" class="form-control"
                                                   name="smtp_encryption"
                                                   value="{{isset($smtp->encryption)?$smtp->encryption:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'encryption'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('delivery_email') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="delivery_email">{{trans('dashboard.smtp.Delivery Email')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="delivery_email" class="form-control"
                                                   name="delivery_email"
                                                   value="{{isset($smtp->delivery_email)?$smtp->delivery_email:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'delivery_email'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('admin_email') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="admin_email">{{trans('dashboard.smtp.Admin Email')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="admin_email" class="form-control"
                                                   name="admin_email"
                                                   value="{{isset($smtp->admin_email)?$smtp->admin_email:''}}"/>
                                            @include('dashboard.partials._errors', ['input' => 'admin_email'])
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

