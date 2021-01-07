@extends('dashboard.layouts.app')

@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.settings.Social Links')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>

                            <li class="breadcrumb-item active">{{ trans('dashboard.Social.Edit Social links') }}</li>
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

                                <div class="form-group row {{ $errors->has('linkedin') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="linkedin">{{trans('dashboard.Social.LinkedIn')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="linkedin" class="form-control"
                                                   name="settings[linkedin]"
                                                   value="@if(isset($settings['linkedin'])) {{ $settings['linkedin'] }} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'linkedin'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="facebook">{{trans('dashboard.Social.Facebook')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="facebook" class="form-control"
                                                   name="settings[facebook]"
                                                   value="@if(isset($settings['facebook'])) {{ $settings['facebook'] }} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'facebook'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('twitter') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="twitter">{{trans('dashboard.Social.Twitter')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="twitter" class="form-control"
                                                   name="settings[twitter]"
                                                   value="@if(isset($settings['twitter'])) {{ $settings['twitter'] }} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'twitter'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('instagram') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="instagram">{{trans('dashboard.Social.Instagram')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="instagram" class="form-control"
                                                   name="settings[instagram]"
                                                   value="@if(isset($settings['instagram'])) {{ $settings['instagram'] }} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'instagram'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('whatsapp') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="whatsapp">{{trans('dashboard.Social.WhatsApp')}}</label>

                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">+966</span>
                                                </div>
                                                <input type="text" class="form-control phone-inputmask" id="phone-mask"
                                                       placeholder="Enter Phone Number" name="settings[whatsapp]"
                                                       value="@if(isset($settings['whatsapp'])) {{ $settings['whatsapp'] }} @endif"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group row {{ $errors->has('snapchat') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="snapchat">{{trans('dashboard.Social.SnapChat')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="text" id="snapchat" class="form-control"
                                                   name="settings[snapchat]"
                                                   value="@if(isset($settings['snapchat'])) {{ $settings['snapchat'] }} @endif"/>
                                            @include('dashboard.partials._errors', ['input' => 'snapchat'])
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
@section('scripts')
    <script src="{{ asset('dashboard_files/app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/extended/form-inputmask.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/assets/js/image-review.js') }}"></script>
@endsection
