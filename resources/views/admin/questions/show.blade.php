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
                            <h3 class="card-title">Thông tin chi tiết</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Tên câu hỏi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="name">{{ $data['question']->name }}</textarea>
                            </div>
            
                            <div class="form-group">
                                <label for="sel1">Thể loại</label>
                                <select class="form-control" id="sel1" name="type_id">
                                    @foreach ($data['types'] as $item)
                                        <option value="{{ $item->id }}" {{ $item->name == $data['question']->type ? 'active' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Độ khó</label>
                                <select class="form-control" id="sel1" name="difficulty">
                                    <option value="Dễ">Dễ</option>
                                    <option value="Trung bình">Trung bình</option>
                                    <option value="Khó">Khó</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
