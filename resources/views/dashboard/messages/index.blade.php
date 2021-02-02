@extends('dashboard.layouts.app')
@section('title', trans('dashboard.main.messages'))
@section('content')
    <div class="content-wrapper">
        <!--content wrapper -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.main.messages')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.main.messages')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- end of content header -->

        @include('dashboard.partials._alert')
        <!--content body -->
        <div class="content-body">
            <!-- Description -->
            <section id="description" class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- HTML5 export buttons table -->
                        <section id="dom">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{trans('dashboard.messages.owner')}}</th>
                                                        <th>{{trans('dashboard.messages.content')}}</th>
                                                        <th>{{trans('dashboard.messages.The answer')}}</th>
                                                        <th>{{trans('dashboard.main.Actions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($messages as $index => $message)
                                                        <tr>
                                                            <th>{{ $index + 1 }}</th>
                                                            <th>{{ ($message->user->name) ?? '' }}</th>
                                                            <th>{{ $message->message }}</th>
                                                            <th>{{ ($message->answer) ?? '' }}</th>
                                                            <td>
                                                                <a href="#" class="btn btn-success btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target="#replySMS">{{ trans('dashboard.complaints.SMS Reply') }}</a>
                                                                <a href="#" class="btn btn-primary btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target="#reply-email">{{ trans('dashboard.complaints.email Reply') }}</a>
                                                                <a href="#" class="btn btn-secondary btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target="#reply-notification">{{ trans('dashboard.complaints.Notification Reply') }}</a>

                                                                <a href="{{ route('dashboard.message.show', $message) }}"
                                                                   class="btn btn-danger btn-sm" title="">
                                                                    <i class="ft ft-eye"></i> {{ trans('dashboard.messages.show') }}
                                                                </a>

                                                            </td>
                                                        </tr>
                                                        @include('dashboard.messages.modal_reply_email')
                                                        @include('dashboard.messages.modal_reply_notification')
                                                        @include('dashboard.messages.modal_reply_SMS')
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--/ HTML5 export buttons table -->
                    </div>
                </div>
            </section>
            <!--/ Description -->
        </div>
        <!--end of content body -->
    </div>

    <!--end of content wrapper -->

@endsection
