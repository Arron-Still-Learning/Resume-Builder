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

<body class="forget-body">
    <section class="sec-forget">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="sec-forget-header">
            <h2 class="font32">Forget Password</h2>
        </div>
        <form action="{{ route('forgotPassword') }}" method="POST" class="forget-form">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            @error('email')
                <span class="text-danger font12">{{ $message }}</span>
            @enderror
            <div class="sec-forget-btn">
                <a href="{{ route('login.page') }}">
                    <button class="back-btn" type="button">
                        Back
                    </button>
                </a>
                <button type="submit" class="forget">Send</button>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
