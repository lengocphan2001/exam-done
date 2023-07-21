@extends('admin.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $data['title'] }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật thành viên</h3>
                        </div>
                        <form action="{{ route('admin.users.update', ['user' => $data['user']]) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tên thành viên</label>
                                    <input class="form-control" type="text" name="name" value="{{ $data['user']->name }}"/>
                                </div>
                                @if ($errors->has('name'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                    <input class="form-control" type="text" name="email" value="{{ $data['user']->email }}"/>
                                </div>
                                @if ($errors->has('email'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('email') }}
                                    </div>
                                @endif

                                

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ</label>
                                    <input class="form-control" type="text" name="address" value="{{ $data['user']->address }}"/>
                                </div>
                                @if ($errors->has('address'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('address') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Số điện thoại</label>
                                    <input class="form-control" type="text" name="phone" value="{{ $data['user']->phone }}"/>
                                </div>
                                @if ($errors->has('phone'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('phone') }}
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mật khẩu</label>
                                    <input class="form-control" type="text" name="password"/>
                                </div>
                                @if ($errors->has('age'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('age') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="sel1">Quản trị viên</label>
                                    <select class="form-control" id="sel1" name="isAdmin">
                                        <option value="1" {{ $data['user']->isAdmin == 1 ? 'selected' : '' }}>Có</option>
                                        <option value="0" {{ $data['user']->isAdmin == 0 ? 'selected' : '' }}>Không</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Hoạt động</label>
                                    <select class="form-control" id="sel1" name="isActive">
                                        <option value="1" {{ $data['user']->isActive == 1 ? 'selected' : '' }}>Có</option>
                                        <option value="0" {{ $data['user']->isActive == 0 ? 'selected' : '' }}>Không</option>
                                    </select>
                                </div>
                                

                            </div>
                            

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật thành viên</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
