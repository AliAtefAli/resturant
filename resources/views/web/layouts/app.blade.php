<!doctype html>
<html lang="{{lang()}}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('web_files/css/bootstrap.min.css')}}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{asset('web_files/css/all.min.css')}}">
    <!--Owl Carousel-->
    <link rel="stylesheet" href="{{asset('web_files/css/owl.carousel.min.css')}}">
    <!--Animate-->
    <link rel="stylesheet" href="{{asset('web_files/css/animate.min.css')}}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('web_files/css/style.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="@if(isset($setting['favicon'])){{asset('assets/uploads/settings/' . $setting['favicon'] )}} @else {{ asset('dashboard_files/app-assets/images/ico/favicon.ico') }} @endif">

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    @if(lang() == 'en')
        <link rel="stylesheet" href="{{asset('web_files/css/en.css')}}">
    @endif
    @yield('style')

    <title>{{ $setting[lang() . '_name'] ?? "" }}</title>
</head>
<body>
<div class="above-all">

    @include('web.layouts._header')

    @yield('content')

    @include('web.layouts._footer')


</div>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('web_files/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('web_files/js/popper.min.js')}}"></script>
<script src="{{asset('web_files/js/bootstrap.min.js')}}"></script>
<script src="{{asset('web_files/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('web_files/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>


<!--Mein-->
<script src="{{asset('web_files/js/script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
    $(document).ready(function () {
        @if(session()->has('success'))
        toastr.success("{{ session()->get('success') }}");
        @elseif(session()->has('error'))
        toastr.error("{{ session()->get('error') }}");
        @endif
    });
</script>
@yield('scripts')
</body>
</html>
