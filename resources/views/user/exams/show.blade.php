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
    <title>Document</title>
</head>

<body>
    <!-- QUIZ ONE -->
    <div class="contatiner d-flex flex-row p-5 justify-content-center bg-primary">
        <form action="{{ route('exam.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="d-flex flex-row p-5 justify-content-center">
                @foreach ($exam->questions as $item)
                    <div class="card p-3">
                        @php
                            $question = Question::where('id', $item->question_id)->first();
                        @endphp
                        <h3>{{ $question->name }}</h3>

                        @php
                            $answers = $question->answers;
                        @endphp
                        @for ($i = 0, $c = 'A'; $i < $answers->count(); $i++, $c++)
                            @php
                                $ans = $answers[$i];
                            @endphp
                            <p>
                                <input type="radio" id="test{{$item->id}}{{$ans->id}}" name="radio-group{{$item->id}}" value="{{$c}}">
                                <label for="test{{$item->id}}{{$ans->id}}">{{$ans->answer}}</label>
                            </p>
                        @endfor
                        {{-- @foreach ($answers as $ans)
                            
                        @endforeach --}}
                    </div>
                @endforeach
            </div>
            <button type="submit" class="">Nộp bài</button>
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
        top: 4px;
        left: 4px;
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

</html>
