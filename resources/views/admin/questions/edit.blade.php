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
                            <h3 class="card-title">Chỉnh sửa câu hỏi</h3>
                        </div>
                        <form action="{{ route('admin.questions.update', ['question' => $data['question']]) }}"
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
                                        <option value="2" {{ $data['question']->number_of_answers == 2 ? 'selected' : ''}}>2</option>
                                        <option value="3" {{ $data['question']->number_of_answers == 3 ? 'selected' : ''}}>3</option>
                                        <option value="4" {{ $data['question']->number_of_answers == 4 ? 'selected' : ''}}>4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Giải thích</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note">{{ $data['question']->note }}</textarea>
                                </div>
                                @if ($errors->has('note'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('note') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="sel1">Đáp án đúng</label>
                                    <select class="form-control" id="sel1" name="answer">
                                        {{ $data['question']->answer == 'A' ? 'true' : 'false'}}
                                        @for ($i = 0, $c = 'A'; $i < $data['question']->number_of_answers; $i++, $c++)
                                            <option value="{{ $c }}" {{ $data['question']->answer == $c ? 'selected' : ''}}>{{ $c }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="form-group" id="question-image">
                                    <label for="exampleFormControlTextarea1" class="form-label">Hình ảnh</label>
                                    <input type="file" name="image" class="form-control" style="padding: 3px" />
                                </div>

                            </div>
                            <div class="card-body">
                                <h3>Câu trả lời</h3>
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
        $('#kind').on('change', function() {
            if (this.value == 1 || this.value == 2) {
                $('#question-image').show();
            } else {
                $('#question-image').hide();
            }
        });
    </script>
@endpush
