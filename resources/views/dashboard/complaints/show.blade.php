@extends('dashboard.layouts.app')
@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">2 Columns</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Page Layouts</a>
                            </li>
                            <li class="breadcrumb-item active">2 Columns
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of content header -->

        <!--content body -->
        <div class="content-body">
            <section id="description" class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('dashboard.complaints.content') }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <p>{{ $complaint->message }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
