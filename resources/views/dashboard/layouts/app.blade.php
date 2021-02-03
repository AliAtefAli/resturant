<!DOCTYPE html>
<html class="loading" lang="{{lang()}}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title', trans('dashboard.main.dashboard'))</title>
    <link rel="apple-touch-icon"
          href="@if(isset($setting['logo'])){{asset('assets/uploads/settings/' . $setting['logo'] )}} @else {{ asset('dashboard_files/app-assets/images/ico/favicon.ico') }} @endif">
    <link rel="shortcut icon" type="image/x-icon"
          href="@if(isset($setting['favicon'])){{asset('assets/uploads/settings/' . $setting['favicon'] )}} @else {{ asset('dashboard_files/app-assets/images/ico/favicon.ico') }} @endif">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">


    @if(lang() == 'ar')
        <!-- BEGIN RTL CSS-->
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css-rtl/vendors.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css-rtl/app.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css-rtl/custom-rtl.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/vendors/css/cryptocoins/cryptocoins.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/assets/css/style-rtl.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css-rtl/pages/error.css')}}">

        <!-- END RTL CSS-->
    @else
        <!-- BEGIN LTR CSS-->
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css/vendors.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css/app.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css/core/colors/palette-gradient.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/vendors/css/cryptocoins/cryptocoins.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/assets/css/style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css/pages/error.css')}}">

        <!-- END LTR CSS-->
        @endif

    <!-- DataTable css -->
    @if(lang() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/vendors/css/tables/extensions/datatables.ar.css')}}">

        @else

        <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    @endif

{{--    <link rel="stylesheet" type="text/css"--}}
{{--          href="{{asset('dashboard_files/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">--}}
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard_files/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard_files/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard_files/app-assets/vendors/css/extensions/sweetalert.css')}}">
    <!-- End of DataTable -->

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/app-assets/css/image-preview.css')}}">

    @yield('styles')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">

<!-- navbar-->
@include('dashboard.layouts._navbar')
<!-- end of navbar-->

<!-- side-menu -->
@include('dashboard.layouts._aside')
<!-- End of side-menu -->

<!-- Main Content -->
    <div class="app-content content">
        @yield('content')
    </div>
<!-- end of Main Content -->

<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">
        @if(isset($setting[app()->getLocale() . '_rights']))
            {!!  $setting[app()->getLocale() . '_rights'] !!}
        @endif
        </span>
    </p>
</footer>



<!-- BEGIN JS-->
<script src="{{asset('dashboard_files/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>

<script src="{{asset('dashboard_files/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>

<script src="{{asset('dashboard_files/app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>

<script src="{{asset('dashboard_files/app-assets/vendors/js/tables/buttons.flash.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>

<script src="{{asset('dashboard_files/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/charts/echarts/chart/line.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/charts/echarts/chart/scatter.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/charts/echarts/chart/k.js')}}" type="text/javascript"></script>

<script src="{{asset('dashboard_files/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard_files/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
        type="text/javascript"></script>
<!-- END JS-->

<!-- Datatable js -->
<script src="{{asset('dashboard_files/app-assets/js/scripts/tables/datatables/datatable-advanced.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('dashboard_files/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.min.js') }}"></script>
<!-- End of Datatable js -->

<!-- SweetAlert js -->
<script src="{{asset('dashboard_files/app-assets/js/scripts/extensions/sweet-alerts.js')}}" type="text/javascript"></script>
<!-- End of SweetAlert js -->
<script src="{{asset('dashboard_files/app-assets/js/scripts/image-preview.js')}}" type="text/javascript"></script>
@yield('scripts')
</body>
</html>
