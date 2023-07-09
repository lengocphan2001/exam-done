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
                            <h3 class="card-title">Thêm câu trả lời</h3>
                        </div>
                        <form action="{{ route('answers.store', ['id' => $data['question_id']]) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Câu trả lời 1</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Câu trả lời 1" name="question1">
                                </div>
                                @if ($errors->has('question1'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('question1') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh câu trả lời 1</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image_question1">
                                            <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Câu trả lời 2</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Câu trả lời 2" name="question2">
                                </div>
                                @if ($errors->has('question2'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('question2') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh câu trả lời 2</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image_question2">
                                            <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Câu trả lời 3</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Câu trả lời 3" name="question3">
                                </div>
                                @if ($errors->has('question3'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('question3') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh câu trả lời 3</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image_question3">
                                            <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Câu trả lời 4</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Câu trả lời 4" name="question4">
                                </div>
                                @if ($errors->has('question4'))
                                    <div class='text-danger mt-2'>
                                        * {{ $errors->first('question4') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh câu trả lời 4</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image_question4">
                                            <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm câu trả lời</button>
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
