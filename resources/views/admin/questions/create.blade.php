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
                        <form action="{{ route('admin.questions.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tên câu hỏi</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="name"></textarea>
                                </div>
                                @if ($errors->has('name'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="sel1">Thể loại</label>
                                    <select class="form-control" name="kind_id" id="kind">
                                        @foreach ($data['kinds'] as $item)
                                            <option value={{ $item->id }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Điểm liệt</label>
                                    <select class="form-control" id="sel1" name="is_paralysis">
                                        <option value="1">Có</option>
                                        <option value="0">Không</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Số lượng câu trả lời</label>
                                    <select class="form-control" id="sel1" name="number_of_answers">
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
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

                                <div class="form-group" id="question-image">
                                    <label for="exampleFormControlTextarea1" class="form-label">Hình ảnh</label>
                                    <input type="file" name="image" class="form-control" style="padding: 3px" />
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

@push('script')
    <script>
        $('#kind').on('change', function() {
            if (this.value == 1 || this.value == 2) {
                $('#question-image').show();
            } else {
                $('#question-image').hide();
            }
        });
    </script>
@endpush
