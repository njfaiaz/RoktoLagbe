@extends('layouts.loginApp')

@section('title', 'Login')

@section('content')
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url({{ asset('assets/login/img/bg-1.jpg') }})"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                        </div>
                        <form class="signin-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="inputBox">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email Address</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Email Address" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password" required />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                    Sign In
                                </button>
                            </div>

                            <div class="form-group d-md-flex mt-3">
                                <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Show Password
                                        <input type="checkbox" />
                                        <span class="checkmark" id="toggle" onclick="showhide()"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="{{ route('password.request') }}">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center m-4">
                            Not a member?
                            <a data-toggle="tab" href="{{ route('register') }}"> Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('footer_scripts')
        <script>
            let password = document.getElementById('password');
            let togglepassword = document.getElementById('toggle');

            function showhide() {
                if (password.type === 'password') {
                    password.setAttribute('type', 'text');
                    togglepassword.classList.add('hide')
                } else {
                    password.setAttribute('type', 'password');
                    togglepassword.classList.remove('hide')
                }
            }
        </script>
    @endpush
@endsection
