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
                <h1>{{  trans('dashboard.main.FAQ') }}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.questions.index')}}">{{trans('dashboard.main.FAQ')}}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.FAQ.Edit Question') }}</li>
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
                                  action="{{ route('dashboard.questions.update', $question) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('question') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.question">{{ trans('dashboard.FAQ.Question ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="{{$key}}.question" type="hidden"
                                                       name="{{$key}}[question]"
                                                       value="{{ $question->translate($key)->question }}">
                                                <trix-editor input="{{$key}}.question"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'question'])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('answer') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.answer">{{ trans('dashboard.FAQ.Answer ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="{{$key}}.answer" type="hidden"
                                                       name="{{$key}}[answer]"
                                                       value="{{ $question->translate($key)->answer }}">
                                                <trix-editor input="{{$key}}.answer"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'answer'])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.FAQ.Edit Question')}}
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
@endsection
