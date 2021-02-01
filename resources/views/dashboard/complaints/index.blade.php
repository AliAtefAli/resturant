@extends('dashboard.layouts.app')
@section('title', trans('dashboard.main.complaints'))
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.main.complaints')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.main.complaints')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of content header -->

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
                                                <table class="table table-striped table-bordered dom-jQuery-events">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{trans('dashboard.complaints.owner')}}</th>
                                                        <th>{{trans('dashboard.complaints.content')}}</th>
                                                        <th>{{trans('dashboard.complaints.The Answer')}}</th>
                                                        <th>{{trans('dashboard.main.Actions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($complaints as $index => $complaint)
                                                        <tr>
                                                            <th>{{ $index + 1 }}</th>
                                                            <th>{{ ($complaint->user->name) ?? '' }}</th>
                                                            <th>{{ $complaint->message }}</th>
                                                            <th>{{ $complaint->answer }}</th>
                                                            <td>
                                                                <a href="" class="btn btn-info btn-sm" title="">{{ trans('dashboard.complaints.SMS') }}</a>
                                                                <a href="" class="btn btn-success btn-sm" title="">{{ trans('dashboard.complaints.notification') }}</a>
                                                                <a href="" class="btn btn-primary btn-sm" title="">E-mail</a>
                                                                <a href="{{ route('dashboard.complaint.show', $complaint) }}" class="btn btn-danger btn-sm" title="">
                                                                    <i class="ft ft-eye"></i> {{ trans('dashboard.complaints.show') }}
                                                                </a>

                                                            </td>
                                                        </tr>

                                                        @include('dashboard.complaints.modal_reply_email')
                                                        @include('dashboard.complaints.modal_reply_notification')
                                                        @include('dashboard.complaints.modal_reply_SMS')
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


@endsection
