<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @stack('style')
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('assets/login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <title>@yield('title') </title>
</head>

<body>
    <section class="ftco-section">

        <div class="content">
            @yield('content')

        </div>

    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="{{ asset('assets/login/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login/js/popper.min.js') }}"></script>

    @stack('footer_scripts')
</body>

</html>
