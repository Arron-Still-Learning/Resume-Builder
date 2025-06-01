@extends('auth.master')

@section('title', 'Register')

@section('content')
    <h2 class="font32 sm-font14">Sign up</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-box">
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Username">
            <label for="">Name</label>
            @error('name')
                <span class="text-danger font12 ms-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-box">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email.....">
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
        <button class="login-btn" type="submit">Sign up</button>
        <div class="logreg-link">
            <p>Don't have an account? <a href="{{ route('login.page') }}" class="login-link">Login</a></p>
        </div>
    </form>
@endsection
