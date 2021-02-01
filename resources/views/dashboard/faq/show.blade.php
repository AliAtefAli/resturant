@extends('dashboard.layouts.app')
@section('title', trans('dashboard.FAQ.Show Question'))
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
                            <li class="breadcrumb-item active">{{ trans('dashboard.FAQ.Show Question') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        @include('dashboard.partials._all_errors')


                            <div class="accordion" id="accordionExample">

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="card">
                                        <div class="card-header" id="{{$key}}-answer-head">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block @if($key == 'ar') text-right @else text-left @endif" type="button"
                                                        data-toggle="collapse" data-target="#{{$key}}-answer-collapse"
                                                        aria-expanded="true" aria-controls="{{$key}}-answer-collapse">
                                                    {!!  $question->translate($key)->question  !!}
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="{{$key}}-answer-collapse" class="collapse @if($key == 'ar') text-right @else text-left @endif" aria-labelledby="{{$key}}-answer-head"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                {!!  $question->translate($key)->answer  !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
@endsection
