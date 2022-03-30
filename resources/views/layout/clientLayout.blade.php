<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Hotel Zaharis')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

    <link rel="stylesheet" href="{{ asset('/vendors/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon" />

    <script src="https://unpkg.com/phosphor-icons"></script>

    @stack('style')
</head>

<body>
    <div class="container-fluid" id="navbar">
        <nav class="nav-navbar d-flex flex-wrap align-items-center justify-content-between position-relative px-3">
            <a href="#" class="d-flex align-items-center col-md-3 text-dark text-decoration-none"> <img
                    src="{{ asset('images/logo.png') }}" style="height: 10vh" alt="Logo" /> Zaharis Hotel </a>

            <div class="nav-menu">
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <a href="#" class="px-2 active nav-link">Home</a>
                    </li>
                    <li><a href="#products" class="px-2 nav-link">Pesan</a></li>
                    <li><a href="#faq" class="px-2 nav-link">Kamar</a></li>
                </ul>
            </div>

            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <a href="/login" class="btn btn-outline-primary">Login</a>
            </div>
        </nav>
    </div>

    @yield('main')

    <footer class="d-flex align-items-center justify-content-center mt-4">
        Copyright 2022. Devin Winando
    </footer>

    <script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

    
    <script src="{{ asset('/js/main.js') }}"></script>
    @stack('script')
</body>

</html>
