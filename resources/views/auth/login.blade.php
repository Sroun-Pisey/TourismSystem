@extends('layouts.app')

@section('content')
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>PLEASE LOGIN TO APP</h3>
            <p>This is the best app ever!</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label class="control-label" for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" placeholder="example@gmail.com" title="Please enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                            <span class="help-block small">Your unique email to app</span>

                            @error('email')
                                <span class="text-danger small"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" placeholder="******" title="Please enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            <span class="help-block small">Your strong password</span>

                            @error('password')
                                <span class="text-danger small"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="checkbox login-checkbox">
                            <label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                            </label>
                            <p class="help-block small">(if this is a private computer)</p>
                        </div>

                        <button type="submit" class="btn btn-success btn-block loginbtn">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('register'))
                        <a class="btn btn-default btn-block" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                        @endif

                        @if (Route::has('password.request'))
                        <a class="btn btn-link btn-block text-center" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © {{ date('Y') }}. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
        </div>
    </div>
</div>
@endsection
