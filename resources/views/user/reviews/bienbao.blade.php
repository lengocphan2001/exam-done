@php
    use App\Models\Exam;
    use App\Models\ExamResult;
    use App\Models\Question;
    use App\Models\Answer;
@endphp
@extends('user.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-white">Ôn tập các câu hỏi sa hình</h1>

        <div class="row col-12 gx-5 mt-5 algin-items-center">
            <div class="col-md-12 col-sm-12 col-xs-12 card p-5">
                <div class="panel panel-default hidden-sm hidden-xs">
                    <div class="panel-body">
                        @foreach ($questions as $question)
                            <h3>Câu {{ $loop->iteration }}: {{ $question->name }}</h3>
                            @if ($question->image)
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row col-sm-12">
                                            <div class="col-sm-6 d-flex flex-row w-100">
                                                <img class="rounded mx-auto d-block img-thumbnail" name="image"
                                                    src="{{ asset($question->image) }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                $answers = Answer::where('question_id', $question->id)->get();
                            @endphp
                            @foreach ($answers as $item)
                                <p class="text-white card f-flex flex-row p-2 justify-content-start bg-success align-items-start">
                                    Đáp án {{$loop->iteration}}: {{ $item->answer }}
                                </p>
                            @endforeach
                            <p>Câu trả lời đúng là {{ $question->answer }}</p>
                            <p class="text-warning">Giải thích: {{ $question->note }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
