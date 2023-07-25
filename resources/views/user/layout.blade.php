<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <title>Trang chủ</title>
</head>

<body style="height: auto">

    <header class="site-navbar" role="banner">
        <div class="container-fluid pl-5">
            <div class="row align-items-center mb-5">
                <div class="col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="{{ asset('dashboard') }}" class="text-primary mb-0">Tên web</a></h1>
                </div>
                <div class="col-md-9 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active"><a href="{{ asset('dashboard') }}"><span>Trang chủ</span></a></li>

                            <li><a href="{{ asset('exam') }}"><span>Thi thử A1</span></a></li>
                            <li><a href="{{ asset('about.html') }}"><span>Thi 20 câu điểm liệt</span></a></li>
                            <li><a href="{{ asset('blog.html') }}"><span>Lý thuyết</span></a></li>
                            <li class="has-children">
                                @if (Auth::user() && Auth::user()->isActive)
                                    <a href="{{ asset('#') }}"><span>{{ Auth::user()->name }}</span></a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ asset('register') }}">Trang cá nhân</a></li>
                                        <li><a href="{{ asset('logout') }}">Đăng xuất</a></li>
                                        <li><a href="{{ asset('#') }}">Lịch sử thi</a></li>
                                    </ul>
                                @else
                                    <a href="{{ asset('login') }}"><span>Đăng nhập</span></a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ asset('register') }}">Đăng ký</a></li>
                                    </ul>
                                @endif

                            </li>
                        </ul>
                    </nav>
                </div>


                {{-- <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                        href="{{ asset('#') }}" class="site-menu-toggle js-menu-toggle text-white"><span
                            class="icon-menu h3"></span></a></div> --}}

            </div>

        </div>
        <div class="content pb-5">
            @yield('content')
        </div>

    </header>
    </div>
    
    
    <script src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('user/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    @yield('script')
        

</body>

</html>
