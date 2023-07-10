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
                            <h3 class="card-title">Chỉnh sửa thể loại</h3>
                        </div>
                        <form action="{{ route('types.update', ['type' => $data['type']]) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thể loại</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên thể loại" name="name" value="{{ $data['type']->name }}">
                                </div>
                                @if ($errors->has('name'))
                                        <div class='text-danger mt-2'>
                                            * {{ $errors->first('name') }}
                                        </div>
                                    @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
