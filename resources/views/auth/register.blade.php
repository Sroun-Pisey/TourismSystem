@extends('layouts.app')

@section('content')
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center custom-login">
            <h3>Registration</h3>
            <p>This is the best app ever!</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label for="name">Username</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="password">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="password-confirm">Repeat Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="email">Email Address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="text-danger small"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="email_confirmation">Repeat Email Address</label>
                                <input id="email_confirmation" type="email" class="form-control"
                                    name="email_confirmation" value="{{ old('email_confirmation') }}" required>
                            </div>

                            <div class="checkbox col-lg-12">
                                <label>
                                    <input type="checkbox" name="newsletter" class="i-checks" checked>
                                    Sign up for our newsletter
                                </label>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success loginbtn">{{ __('Register') }}</button>
                            <a href="{{ route('login') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © {{ date('Y') }}. All rights reserved. Template by
                <a href="https://colorlib.com/wp/templates/">Colorlib</a>
            </p>
        </div>
    </div>
</div>
@endsection
