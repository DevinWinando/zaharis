<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Resepsionis')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.css') }}" />

        <link rel="stylesheet" href="{{ asset('/vendors/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-icons/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon" />
    @stack('style')
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-4">
                <div class="header-top">
                    <div class="container">
                        <div class="logo" style="height: 100%">
                            <a href="index.html"><img src="{{ asset('images/logo.png') }}" style="height: 64px" alt="Logo">Zaharis Hotel</a>
                        </div>
                        <div class="header-top-right">
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->username }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">Resepsionis</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img
                                                    src="{{ asset('images/faces/1.jpg') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ Auth::user()->username }}</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i>
                                            My
                                            Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/admin/logout') }}"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="burger-btn d-block d-xl-none d-print-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <nav class="main-navbar d-print-none">
                    <div class="container">
                        <ul>
                            <li class="menu-item">
                                <a href="/resepsionis/dashboard" class='menu-link'>
                                    <i class="bi bi-grid-fill mb-1"></i>
                                    <span >Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/resepsionis/reservasi" class='menu-link'>
                                    <i class="bi bi-grid-fill mb-1"></i>
                                    <span >Reservasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">
                @yield('main')
            </div>
        </div>
    </div>

    <script src="{{ asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

    @stack('script')

</body>

</html>
