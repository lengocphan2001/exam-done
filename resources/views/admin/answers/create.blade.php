@php
    use App\Models\Question;
@endphp

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
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="input-group control-group increment">
                        <input type="file" name="filename[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="button"><i
                                    class="glyphicon glyphicon-plus"></i>Thêm hình ảnh</button>
                        </div>
                    </div>
                    <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>
                                    Xóa</button>
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm câu trả lời</h3>
                        </div>
                        <form action="{{ route('answers.store', ['id' => $data['question_id']]) }}"
                            enctype="multipart/form-data" method="post">
                            @csrf

                            @for ($i = 1; $i <= Question::where('id', $data['question_id'])->first()->number_of_answers; $i++)
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Câu trả lời {{ $i }}</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Câu trả lời {{ $i }}"
                                            name="question{{ $i }}">
                                    </div>
                                </div>
                            @endfor

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
    <script>
        $(document).ready(function() {

            $(".btn-success").click(function() {
                // var html = $(".clone").html();
                var html = `<div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                            <input type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>
                                    Remove</button>
                            </div>
                        </div>
                    </div>`;
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>
@endpush
