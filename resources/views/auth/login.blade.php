@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-6">
        <div class="px-3 py-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row px-3">
                    <h6 class="mb-0 text-sm">Email Address</h6>
                    <input id="email" type="email" class="contact-form__input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter a email address" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row px-3">
                    <h6 class="mb-0 text-sm">Password</h6>
                    <input id="password" type="password" class="contact-form__input form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row px-3 mb-4">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="custom-control-label text-sm" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="ml-auto mb-0 text-sm" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <div class="row mb-3 px-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                </div>
                <div class="row mb-4 px-3"> 
                    <small class="font-weight-bold">Don't have an account? 
                        <a href="/register" class="text-primary">Signup</a>
                    </small> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
