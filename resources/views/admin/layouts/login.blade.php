<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/login/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/login/main.css') }}">
    @stack('style')
    <title>@yield('title') </title>
</head>

<body>
    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container p-4">
            @yield('content')
        </div>
    </section>
    <!--================End Login Box Area =================-->

</body>

</html>
