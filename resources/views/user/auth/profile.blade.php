@extends('user.layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Trang cá nhân</h3>
                        </div>
                        {{ $errors}}
                        <form action="{{ route('update') }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Họ và tên</label>
                                    <input class="form-control" type="text" name="name"
                                        value="{{ $data['user']->name }}" />
                                </div>
                                @if ($errors->has('name'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                    <input class="form-control" type="text" name="email"
                                        value="{{ $data['user']->email }}" />
                                </div>
                                @if ($errors->has('email'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('email') }}
                                    </div>
                                @endif



                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ</label>
                                    <input class="form-control" type="text" name="address"
                                        value="{{ $data['user']->address }}" />
                                </div>
                                @if ($errors->has('address'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('address') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Số điện thoại</label>
                                    <input class="form-control" type="text" name="phone"
                                        value="{{ $data['user']->phone }}" />
                                </div>
                                @if ($errors->has('phone'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('phone') }}
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mật khẩu</label>
                                    <input class="form-control" type="password" name="password" />
                                </div>
                                @if ($errors->has('password'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('password') }}
                                    </div>
                                @endif
                            
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
