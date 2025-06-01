@extends('auth.master')

@section('title', 'Login')

@section('content')
    <a href="{{ route('welcome.page') }}">
        <img src="{{ asset('images/back-btn.png') }}" class="back-key" alt="Back" style="width: 30px; height: 30px;">
    </a>
    <h2 class="font32 sm-font14">Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="input-box">
            <input type="email" name="email" placeholder="Enter your email....." value="{{ old('email') }}">
            <label for="">Email</label>
            @error('email')
                <span class="text-danger font12 ms-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="********">
            <label for="">Password</label>
            @error('password')
                <span class="text-danger font12 ms-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="forget-password mb30 pb5 font11">
            <a href="{{ route('forgotPassword.page') }}">Forgot password?</a>
        </div>
        <button class="login-btn" type="submit">Login</button>

        <div class="logreg-link">
            <p>Don't have an account? <a href="{{ route('register.page') }}" class="register-link">Sign up</a></p>
        </div>
    </form>
@endsection
