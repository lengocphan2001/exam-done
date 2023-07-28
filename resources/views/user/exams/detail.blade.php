@php
    use \App\Models\Exam;
    use \App\Models\Question;
@endphp
@extends('user.layout')

@section('content')
    {{ $exam }}
    <div class="container mt-5">
        <h1 class="text-center text-white">{{ Exam::where('id', $exam->exam_id)->first() }}</h1>

        {{-- <div class="row col-12 gx-5 mt-5 algin-items-center">
            <div class="col-md-12 col-sm-12 col-xs-12 card p-5">
                <div class="panel panel-default hidden-sm hidden-xs">
                    <div class="panel-body">
                        <h2 class="text-success">Kết quả bài thi</h2>
                        @php
                            $exam_questions = $exam->examQuestions;
                        @endphp
                        @for ($i = 0; $i < 25; $i++)
                            @php
                                $question = Question::where('id', $exam_questions[$i]->question_id)->first();
                            @endphp
                            <h3>{{ $question->name }}</h3>
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
                            <p>Câu trả lời đúng là {{ $question->answer }}</p>
                            @if ($exam_questions[$i]->is_true)
                                <p class="text-success">Bạn trả lời đúng</p>
                            @else
                            <p class="text-danger">Bạn trả lời sai</p>
                            @endif
                            <p class="text-warning">Giải thích: {{ $question->note }}</p>
                        @endfor
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

