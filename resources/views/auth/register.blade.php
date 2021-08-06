@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-lg-6">
        <div class="px-3 py-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row px-3"> 
                    <h6 class="mb-0 text-sm">Full Name</h6>
                    <input id="name" type="text" class="contact-form__input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row px-3">
                    <h6 class="mb-0 text-sm">Phone Number</h6>
                    <input id="phone" type="number" class="contact-form__input form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter a valid phone number" required min="0">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="row px-3"> 
                    <h6 class="mb-0 text-sm">Email Address</h6>
                    <input id="email" type="email" class="contact-form__input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter a valid email address" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row px-3">
                    <h6 class="mb-0 text-sm">Password</h6>
                    <input id="password" type="password" class="contact-form__input form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div>
                <div class="row px-3 pb-3">
                    <h6 class="mb-0 text-sm"> Confirm Password</h6>
                    <input id="password-confirm" type="password" class="contact-form__input form-control" name="password_confirmation" placeholder="Enter password again" required autocomplete="new-password">
            </div>
                <div class="row mb-3 px-3"> 
                    <button type="submit" class="btn btn-primary">Signup</button> 
                </div>
                <div class="row mb-4 px-3">
                    <small class="font-weight-bold">Already a member? 
                        <a href="/login" class="text-primary">Login</a>
                    </small> 
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
