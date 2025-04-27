<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/boxicons-master/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bfont-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/coustom/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/coustom/css/toastr.css') }}">
    @stack('style')
    <title>@yield('title') </title>
</head>

<body>

    @include('frontend.layouts.nav')

    <!--------------------- Nave Bar End ---------------------------------------->
    <section class="content">

        @yield('frontend_content')


        <div class="footer"> </div>
    </section>


    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('assets/frontend/js/fontawesome.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    @include('alert')
    @stack('footer_scripts')
</body>

</html>
