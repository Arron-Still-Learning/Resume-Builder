<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/utill.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <title>Admin Login</title>
</head>

<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <div class="form-box Login">
            <a href="{{ route('welcome.page') }}">
                <img src="{{ asset('images/back-btn.png') }}" class="back-key" alt="Back"
                    style="width: 30px; height: 30px;">
            </a>
            <h2 class="font32 sm-font14">Login</h2>
            @if (session('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('loginError') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fa-sharp fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif
            <form action="{{ route('admin.actionLogin') }}" method="POST">
                @csrf
                <div class="input-box">
                    <input type="email" name="email" placeholder="Enter your email....."
                        value="{{ old('email') }}">
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
                <button class="login-btn" type="submit">Login</button>
            </form>
        </div>
        <div class="info-text login-text">
            <h2 class="font36">welcome To!</h2>
            <p>Our Resume Builder</p>
        </div>
    </div>
</body>

</html>
