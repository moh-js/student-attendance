@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-lg-12">
            <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                <div class="w-100">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                        <h4 class="text-center">STUDENT EXAM AUTHORIZATION BASED ON ATTENDANCE SYSTEM (SEABAS)</h4>
                            <div>
                                <div class="text-center">
                                    <div>
                                        {{-- <a href="index.html" class="logo"><img src="assets/images/logo-dark.png" height="20" alt="logo"></a> --}}
                                    </div>

                                </div>

                                <div class="p-2 mt-5">
                                    <form class="form-horizontal"  method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group auth-form-group-custom mb-4">
                                            <i class="ri-user-2-line auti-custom-input-icon"></i>
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="username" placeholder="Enter username" value="{{ old('email') }}" name="email">

                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group auth-form-group-custom mb-4">
                                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                            <label for="userpassword">{{ __('Password') }}</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <div class="mt-4 text-center">
                                                <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> {{ __('Forgot your password?') }}</a>
                                            </div>
                                        @endif
                                    </form>
                                </div>

                                <div class="mt-5 text-center">
                                    <p>© 2020 Nazox. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
