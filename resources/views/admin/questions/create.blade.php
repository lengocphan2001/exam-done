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
                            <h3 class="card-title">Thêm câu hỏi</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên câu hỏi</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nhập tên câu hỏi" name="name" maxlength="2">
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Thể loại</label>
                                    <select class="form-control" id="sel1">
                                        @foreach ($data['types'] as $item)
                                             <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Độ khó</label>
                                    <select class="form-control" id="sel1">
                                        <option value="Dễ">Dễ</option>
                                        <option value="Trung bình">Trung bình</option>
                                        <option value="Khó">Khó</option>
                                    </select>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tạo câu hỏi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
