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
                <h1 class="content-header-title">{{trans('dashboard.News Letter.News Letter')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                        href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.News Letter.News Letter') }}</li>
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
                                  action="{{ route('dashboard.send.news.letter') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2">{{ __('dashboard.News Letter.Message') }}</label>
                                            <div class="col-md-10">
                                                <input id="message" type="hidden"
                                                       name="message"
                                                       value="">
                                                <trix-editor input="message"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'message'])
                                            </div>
                                        </div>
                                    </div>

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-md-2"
                                               for="name">{{ __('dashboard.News Letter.E-mails') }}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative">
                                                <div class="row">
                                                    @foreach($news_letter as $letter)
                                                        <div class="col col-md-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="emails[]"
                                                                   value="{{ $letter->email }}" id="{{ $letter->id }}">
                                                            <label class="form-check-label" for="{{  $letter->id }}">
                                                                {{ $letter->email }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                        @include('dashboard.partials._errors', ['input' => 'emails_id'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.inbox.Send Message')}}
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
    <script src="{{ asset('dashboard_files/app-assets/js/scripts/forms/select/form-selectize.min.js') }}"></script>
@endsection
