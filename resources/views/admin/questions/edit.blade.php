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
                        <form action="{{ route('questions.update', ['question' => $data['question']]) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tên câu hỏi</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="name">{{ $data['question']->name }}</textarea>
                                </div>
                                @if ($errors->has('name'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="sel1">Thể loại</label>
                                    <select class="form-control" id="sel1" name="type">
                                        <option value="Sa hình">Sa hình</option>
                                        <option value="Luật giao thông đường bộ">Luật giao thông đường bộ</option>
                                        <option value="Luật biển báo giao thông">Luật biển báo giao thông</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Độ khó</label>
                                    <select class="form-control" id="sel1" name="difficulty">
                                        <option value="Dễ"
                                            selected="{{ 'Dễ' == $data['question']->difficulty ? 'selected' : '' }}">Dễ
                                        </option>
                                        <option value="Trung bình"
                                            selected="{{ 'Trung bình' == $data['question']->difficulty ? 'selected' : '' }}">
                                            Trung bình</option>
                                        <option value="Khó"
                                            selected="{{ 'Khó' == $data['question']->difficulty ? 'selected' : '' }}">Khó
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Ghi chú</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                                </div>
                                @if ($errors->has('note'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('note') }}
                                    </div>
                                @endif

                            </div>
                            <div class="card-body">
                                @foreach ($data['question']->answers as $item)
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Câu trả lời {{ $loop->iteration }} </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Câu trả lời 1" name="question{{ $loop->iteration }}"
                                                value="{{ $item->answer }}">
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Chỉnh sửa câu hỏi</button>
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
