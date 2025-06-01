<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <!-- External CSS files -->
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/utill.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forget.css') }}">
</head>

<body class="reset-body">
    <section class="sec-reset">
        <div class="sec-reset-header">
            <h2 class="font32">Reset Password</h2>
        </div>
        <form action="{{ route('resetPassword') }}" method="POST" class="reset-form">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger font12">{{ $message }}</span>
            @enderror
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" placeholder="************">
            @error('password')
                <span class="text-danger font12">{{ $message }}</span>
            @enderror
            <label for="confirmPassword">Comfirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="************">
            @error('confirmPassword')
                <span class="text-danger font12">{{ $message }}</span>
            @enderror
            <div class="sec-reset-btn">
                <button type="submit">Comfirm</button>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>