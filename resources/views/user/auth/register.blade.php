<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom mt-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 offset-xl-1 mt-5">
                    <form accept="{{ route('postRegister') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Nhập email</label>
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Điền email" />

                        </div>

                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Mật khẩu</label>
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Nhập mật khẩu" />

                        </div>

                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Nhập lại mật khẩu</label>
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Nhập mật khẩu" />

                        </div>



                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="button" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>

                        </div>
                    </form>
                    <p class="small fw-bold mt-2 pt-1 mb-0">Đã có tài khoản? <a href="#!"
                            class="link-danger">Đăng nhập</a></p>
                </div>
            </div>
        </div>

    </section>
    <script src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('user/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>

</html>
