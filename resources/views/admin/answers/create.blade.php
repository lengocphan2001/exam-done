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

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm câu trả lời</h3>
                        </div>
                        <form action="{{ route('admin.answers.store', ['id' => $data['question_id']]) }}"
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

