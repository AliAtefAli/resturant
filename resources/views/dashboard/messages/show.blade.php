@extends('dashboard.layouts.app')
@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.main.messages')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.complaint.index')}}">{{trans('dashboard.main.messages')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.messages.Reply')}}
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
                <div class="card-header">
                    <h4 class="card-title">{{ trans('dashboard.messages.content') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card-footer">
                <div class="card-footer">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#reply-email">{{ trans('dashboard.messages.email Reply') }}</a>
                    <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#replySMS">{{ trans('dashboard.messages.SMS Reply') }}</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#reply-notification">{{ trans('dashboard.messages.Notification Reply') }}</a>
                </div>
                @include('dashboard.messages.modal_reply_email')
                @include('dashboard.messages.modal_reply_SMS')
                @include('dashboard.messages.modal_reply_notification')
            </section>
        </div>
    </div>
@endsection
