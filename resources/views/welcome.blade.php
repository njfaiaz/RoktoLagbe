<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
</head>

<body class="antialiased">
    @if (Route::has('login'))
        <div>
            @auth
                @if (Auth()->user()->role == '1')
                    @include('admin.dashboard')
                @else
                    @include('frontend.home')
                @endif
            @else
                @include('auth.login')
            @endauth
        </div>
    @endif

</body>

</html>
