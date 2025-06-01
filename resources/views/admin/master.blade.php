<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/utill.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="l-inner d-flex box-space-between">
                <h1 class="header-logo mb-0">
                    <a href="{{ route('welcome.page') }}">
                        <img src="{{ asset('images/logo-img.png') }}" alt="ResumeBuilder" class="logo">
                    </a>
                </h1>
                <nav class="gnav">
                    <div class="d-flex">
                        <div class="dropdown">
                            <div class="dropdown-toggle profile-link" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @if (Auth::guard('admin')->user()->image)
                                    <img src="{{ asset('storage/profile_image/' . Auth::guard('admin')->user()->image) }}"
                                        alt="Profile Picture">
                                @else
                                <img src="{{ asset('images/img-profile.png') }}" alt="Profile">
                                @endif
                            </div>
                            <ul class="dropdown-menu">
                                <li class="ps-0">
                                    <a class="dropdown-item" href="{{ route('admin.profile')}}">
                                        Profile
                                    </a>
                                </li>
                                <li class="ps-0">
                                    <a class="dropdown-item" href="{{ route('admin.password') }}">
                                        Update Password
                                    </a>
                                </li>
                                <li class="ps-0">
                                    <a class="dropdown-item"  href="{{ route('admin.logout') }}">
                                        <h6>Logout</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- header -->

        <!-- sidebar -->
        <div class="d-flex">
            <div class="sidebar">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <a href="{{ route('admin.weekly.chart')}}" class="text-white dash"><i class="fa-solid fa-house me-2"></i> Dashboard</a>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                <i class="fa-solid fa-user-gear me-2"></i> Admin
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <ul class="ps-0">
                                <li><a href="{{ route('admin.adminList')}}" class="text-white lst-itm"><i class="fa-solid fa-clipboard-list me-2"></i> Admin List</a></li>
                                <li><a href="{{ route('admin.account.create') }}" class="text-white lst-itm"><i class="fa-solid fa-folder-plus me-2"></i> Admin Create</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                <i class="fa-solid fa-user me-2"></i> User
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <ul class="ps-0">
                                <li><a href="{{ route('admin.userList')}}" class="text-white lst-itm"><i class="fa-solid fa-clipboard-list me-2"></i> User List</a></li>
                                <li><a href="{{ route('admin.create.account') }}" class="text-white lst-itm"><i class="fa-solid fa-folder-plus me-2"></i> User Create</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
        <!-- /sidebar -->

        <footer class="bg-dark p-2">
            <div class="footer-content">
                <p class="text-white text-center">&copy; 2024 Resume Builder. All rights reserved.</p>
            </div>
        </footer>
        <!-- end footer -->
        {{-- @yield('content') --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
