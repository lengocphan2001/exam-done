<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <title></title>
</head>

<body>
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0">Tên web</a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active"><a href="index.html"><span>Trang chủ</span></a></li>

                            <li><a href="listings.html"><span>Thi thử A1</span></a></li>
                            <li><a href="about.html"><span>Thi 20 câu điểm liệt</span></a></li>
                            <li><a href="blog.html"><span>Lý thuyết</span></a></li>
                            <li class="has-children">
                                @if (Auth::user() && Auth::user()->isActive)
                                
                                    <a href=""><span>{{ Auth::user()->name }}</span></a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ route('register') }}">Trang cá nhân</a></li>
                                        <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                        {{-- <li><a href="#">Menu Two</a></li>
                                    <li><a href="#">Menu Three</a></li> --}}
                                    </ul>
                                @else
                                    <a href="{{ route('login') }}"><span>Đăng nhập</span></a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                        {{-- <li><a href="#">Menu Two</a></li>
                                    <li><a href="#">Menu Three</a></li> --}}
                                    </ul>
                                @endif

                            </li>
                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                        href="#" class="site-menu-toggle js-menu-toggle text-white"><span
                            class="icon-menu h3"></span></a></div>

            </div>

        </div>
        </div>

    </header>
    <div class="hero" style="background-image: url('user/images/hero_1.jpg');">
        @yield('content')
    </div>
    <script src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('user/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>

</html>
