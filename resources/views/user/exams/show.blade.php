@php
    use App\Models\Question;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <script src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('user/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('user/js/jquery-backward-timer.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery-backward-timer.src.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
    <title>Document</title>
</head>

<body>
    <!-- QUIZ ONE -->
    <div class="contatiner d-flex flex-row p-5 justify-content-center bg-primary">
        <div class='timer_block'
            style="margin: 0em;
                left: 0em; top: 0em; background: yellow;
                    position: fixed;">
        </div>
        <form action="{{ route('exam.store', ['id' => $exam->id]) }}" enctype="multipart/form-data" method="post">
            @csrf
            <input id='timer_0' class='timer font-weight-bold' name="time" readonly />
            <div class="d-flex flex-row flex-wrap p-5 justify-content-center">
                @foreach ($exam->questions as $item)
                    <div class="card p-3 w-50">
                        @php
                            $question = Question::where('id', $item->question_id)->first();
                        @endphp
                        
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
                            $answers = $question->answers;
                        @endphp
                        @for ($i = 0, $c = 'A'; $i < $answers->count(); $i++, $c++)
                            @php
                                $ans = $answers[$i];
                            @endphp
                            <p class="card f-flex flex-row p-2 justify-content-start bg-success align-items-start">
                                <input type="radio" id="test{{ $item->id }}{{ $ans->id }}"
                                    name="radio-group{{ $question->id }}" value="{{ $c }}">
                                <label for="test{{ $item->id }}{{ $ans->id }}">{{ $ans->answer }}</label>
                            </p>
                        @endfor
                    </div>
                @endforeach

            </div>
            <button type="submit" class="btn btn-danger" id="btn-submit">Nộp bài</button>
        </form>
    </div>

</body>

<style>
    .d-flex {
        gap: 20px;
    }

    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }

    [type="radio"]:checked+label,
    [type="radio"]:not(:checked)+label {
        position: relative;
        padding-left: 28px;
        margin: 0;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }

    [type="radio"]:checked+label:before,
    [type="radio"]:not(:checked)+label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        border-radius: 100%;
        background: #fff;
    }

    [type="radio"]:checked+label:after,
    [type="radio"]:not(:checked)+label:after {
        content: '';
        width: 12px;
        height: 12px;
        background: #F87DA9;
        position: absolute;
        top: 3px;
        left: 3px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    [type="radio"]:not(:checked)+label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }

    [type="radio"]:checked+label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
</style>


<script>
    $(document).ready(function() {
        $('#timer_0').backward_timer({
            seconds: 1140
        });
        $('#timer_0').backward_timer('start');
        setTimeout(() => {
            alert('Bạn đã hết giờ làm bài');
            $('#btn-submit').click();
        }, 1140000);
    });
</script>

</html>
