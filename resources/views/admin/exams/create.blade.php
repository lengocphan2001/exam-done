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
                            <h3 class="card-title">Thêm bài thi</h3>
                        </div>
                        <form action="{{ route('exams.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tên bài thi</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="name"></textarea>
                                </div>
                                @if ($errors->has('name'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="sel1">Thời gian</label>
                                    <input type="number" name="duration" class="form-control" />
                                </div>
                                @if ($errors->has('duration'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('duration') }}
                                    </div>
                                @endif
                                
                                <div class="form-group">
                                    <label for="sel1">Độ khó</label>
                                    <select class="form-control" id="sel1" name="difficulty">
                                        <option value="Dễ">Dễ</option>
                                        <option value="Trung bình">Trung bình</option>
                                        <option value="Khó">Khó</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Số lượng câu hỏi</label>
                                    <select class="form-control" id="sel1" name="number_of_questions">
                                        <option value="25">25 câu</option>
                                        <option value="30">30 câu</option>
                                    </select>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tạo bài thi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
