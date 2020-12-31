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
                <!-- Description -->
                <section id="description" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Description</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                                <p>2 Columns layout is the most common and popular layout, it has a
                                    navigation with content section. This layout use the common navbar
                                    and footer sections, however you can add customized header or footer
                                    on page level.</p>
                                <div class="alert bg-success alert-icon-left mb-2" role="alert">
                                    <span class="alert-icon"><i class="la la-pencil-square"></i></span>
                                    <span class="alert-icon"><i class="la la-pencil-square"></i></span>
                                    Modern Admin Template default layout is 2 columns. If you do not define pageConfig
                                    block on page or template level, it will consider 2 columns by
                                    default.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Description -->
            </div>
            <!--end of content body -->
        </div>
    <!--end of content wrapper -->
@endsection