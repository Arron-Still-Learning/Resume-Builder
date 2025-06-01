<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/utill.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="l-inner d-flex box-space-between">
                <h1 class="header-logo">
                    @if (Auth::user())
                        @if (Auth::user()->is_admin == 1)
                            <a href="{{ route('admin.list') }}">
                                <img src="{{ asset('images/logo-img.png') }}" alt="ResumeBuilder" class="logo">
                            </a>
                        @else
                            <a href="{{ route('user.list') }}">
                                <img src="{{ asset('images/logo-img.png') }}" alt="ResumeBuilder" class="logo">
                            </a>
                        @endif
                    @else
                        <a href="{{ route('welcome.page') }}">
                            <img src="{{ asset('images/logo-img.png') }}" alt="ResumeBuilder" class="logo">
                        </a>
                    @endif
                </h1>
                <nav class="gnav">
                    <div class="d-flex">
                        @if (Auth::user())
                            <div class="dropdown">
                                <div class="dropdown-toggle profile-link" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @if (Auth::user()->image)
                                        <img src="{{ asset('storage/profile_image/' . Auth::user()->image) }}"
                                            alt="Profile Picture">
                                    @else
                                        <img src="{{ asset('images/img-profile.png') }}" alt="Profile">
                                    @endif
                                </div>
                                <ul class="dropdown-menu">
                                    <li class="ps-0">
                                        <a class="drop-down d-flex" href="{{ route('user.profile') }}">
                                            Profile
                                        </a>
                                    </li>
                                    <li class="ps-0">
                                        <a class="drop-down" href="{{ route('user.password') }}">
                                            Update Password
                                        </a>
                                    </li>
                                    <li class="ps-0">
                                        <a class="dropdown-item" href="{{ route('user.logout') }}">
                                            <h6>Logout</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <li><a href="{{ route('login.page') }}" class="cmn-btn">Login</a></li>
                            <li><a href="{{ route('register.page') }}" class="non-active">Sign Up</a></li>
                            <li><a href="{{ route('contact.page') }}" class="non-active">Contact Us</a></li>
                        @endif
                    </div>
                </nav>
                <p class="menu-icon">
                    <span class="hamburger-line"></span>
                </p>
            </div>
        </header>
        <!-- header -->

        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
