@extends('dashboard.layouts.app')
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ isset($admin) ? word('edit') : word('create') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{word('dashboard')}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admins')}}">{{word('admins')}}</a></li>
                            <li class="breadcrumb-item active">{{ isset($admin) ? word('edit') : word('create') }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        @include('dashboard.partials._alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <!-- form start -->
                            <form class="form-horizontal" method="post" @if(isset($admin)) action="/admins/update"
                                  @else action="/admins/store" @endif enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="name">{{word('name')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="name" class="form-control"
                                                       placeholder="{{word('name')}}"
                                                       name="name" @if(isset($admin)) value="{{$admin->name}}"
                                                       @else value="{{old('name')}}" @endif/>
                                                @include('dashboard.partials._errors', ['input' => 'name'])
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="name">{{word('email')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="email" class="form-control"
                                                       placeholder="{{word('email')}}"
                                                       name="email" @if(isset($admin)) value="{{$admin->email}}"
                                                       @else value="{{old('email')}}" @endif/>
                                                @include('dashboard.partials._errors', ['input' => 'email'])
                                                <div class="form-control-position">
                                                    <i class="ft-mail"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="phone">{{word('phone')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="phone" class="form-control"
                                                       placeholder="{{word('phone')}}"
                                                       name="phone" @if(isset($admin)) value="{{$admin->phone}}"
                                                       @else value="{{old('phone')}}" @endif/>
                                                @include('dashboard.partials._errors', ['input' => 'phone'])
                                                <div class="form-control-position">
                                                    <i class="ft-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="address">{{word('address')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="address" class="form-control"
                                                       placeholder="{{word('address')}}"
                                                       name="address" @if(isset($admin)) value="{{$admin->address}}"
                                                       @else value="{{old('address')}}" @endif/>
                                                @include('dashboard.partials._errors', ['input' => 'address'])
                                                <div class="form-control-position">
                                                    <i class="ft-home"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="password">{{word('password')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="password" id="password" class="form-control"
                                                       placeholder="{{word('password')}}" name="password"/>
                                                @include('dashboard.partials._errors', ['input' => 'password'])
                                                <div class="form-control-position">
                                                    <i class="ft-hash"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="name">{{word('password_confirmation')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="password" id="password" class="form-control"
                                                       placeholder="{{word('password_confirmation')}}" name="password"/>
                                                @include('dashboard.partials._errors', ['input' => 'password'])
                                                <div class="form-control-position">
                                                    <i class="ft-hash"></i>
                                                </div>
                                                @if(isset($admin))
                                                    <span class="label label-warning"
                                                          style="padding: 2px;"> {{word('leave_it')}} </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    @if(isset($admin))
                                        <div class="form-group row {{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label class="col-md-2" for="name">{{word('image')}}</label>
                                            <div class="col-md-10">
                                                <div class="position-relative has-icon-left">
                                                    <input type="file" id="image" class="form-control image"
                                                           name="image"/>
                                                    @include('dashboard.partials._errors', ['input' => 'image'])
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group row {{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label class="col-md-2" for="name">{{word('image')}}</label>
                                            <div class="col-md-10">
                                                <div class="position-relative has-icon-left">
                                                    <input type="file" id="image" class="img-form-control image"
                                                           name="image"/>
                                                    @include('dashboard.partials._errors', ['input' => 'image'])
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        @if(isset($admin))
                                            {{word('edit')}}
                                        @else
                                            {{word('create')}}
                                        @endif</button>
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
    <script>
        $(document).ready(function () {

            $('#password, #password_confirmation').on('keyup', function () {
                if ($('#password').val() == $('#password_confirmation').val()) {
                    $('#message').html("{{word('matching')}}").css('color', 'green');
                } else
                    $('#message').html("{{word('not_matching')}}").css('color', 'red');
            });
        });
    </script>


@endsection
