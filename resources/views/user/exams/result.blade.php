@extends('user.layout')

@section('content')
    <div class="container mt-5">
        <div class="row col-15 mt-5 flex d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-15 col-sm-15 col-xs-15 card p-5">
                <div class="panel panel-default hidden-sm hidden-xs">
                    <div class="panel-body flex d-flex flex-column justify-content-center align-items-center">
                        <h2>
                            <p style="text-align:center"><span
                                    style="color: #0000ff; font-family: arial, helvetica, sans-serif;"><strong
                                        class="text-warning">Chúc mừng bạn đã hoàn thành bài thi</strong></span></p>
                        </h2>
                        <p style="text-align: center;"><img
                                src="https://hoclaixemoto.com/image200/thi-bang-lai-xe-may-a1-online.jpg"></p>
                        <span style="text-align: justify; font-size: 100%; font-family: arial, helvetica, sans-serif;">Bạn đạt được {{ $exam->correct_answer }} / 25 câu trả lời đúng</span>
                        @if ($exam->correct_answer >= 21)
                            <p style="text-align:center"><span
                                    style="color: #0000ff; font-family: arial, helvetica, sans-serif;"><strong
                                        class="text-success">Chúc mừng bạn đã vượt qua bài thi</strong></span></p>
                        @else
                            <p style="text-align:center"><span
                                    style="color: #0000ff; font-family: arial, helvetica, sans-serif;"><strong
                                        class="text-danger">Rất tiếc bạn chưa vượt qua bài thi</strong></span></p>
                        @endif
                        <a href="{{ route('result.detail', ['exam' => $exam]) }}" class="btn btn-danger">Xem thông tin chi tiết</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <style>
    [type=radio] {
        display: none;
    }

    div.content img.hinhnho {
        height: auto;

    }

    .thongtin {

        width: 70%;
        margin-left: 15%;
        height: 50px;
        background-color: #000;

    }

    .margincauhoi {
        margin: 5px;
    }

    .nopdapan {
        background-color: red;
    }

    .labelcauhoi {
        /*min-width: 20px;
 min-height: 20px;*/
    }

    body {
        font-family: apple-system, BlinkMacSystemFont, sans-serif;
        font-size: 17px;
        line-height: 1.7;
        color: #333;
    }

    .inner {
        background: aliceblue;
        border: 1px solid blue;
        margin: 5px 0;
    }

    .fixed {
        position: fixed;
        top: 0;
    }


    .abcxyz {
        padding: 10px;
        background-color: #abc;
    }

    .example {
        background-color: #fff;
        margin: 0px;
        height: auto;
        border: 1px solid #000;
    }


    .pull-left {
        width: 60%;
    }

    .nhomchondethi {
        border: 1px solid #000;
        margin-top: 10px;
        height: auto;
    }

    .chondethi {
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 3px 10px 3px 10px;
        background-color: #BDBDBD;
        border: 1px solid #000;
    }


    .thithu {
        margin: 20px;
        padding: 3px 12px 3px 12px;
        background-color: #BDBDBD;
        border: 1px solid #000;
    }

    input.chondethi:hover {
        background-color: #DF0174;
    }

    .btn-info {
        width: 48px;
        height: 48px;
    }



    table tr td.cau {
        width: 20px;
    }

    table tr td.chon {
        width: 30px;
    }

    input[type=checkbox] {}

    /*troi test cot*/
    .cot1 {
        background-color: #BDBDBD;
        border: 1px solid #000;
        padding: 0px 5px 0px 5px;
    }

    .cot2 {
        background-color: #81BEF7;
        border: 1px solid #000;
        padding: 0px 5px 0px 5px;
    }

    .bntchonde {
        margin: 10px 0px 10px 0px;
        background-color: #BDBDBD;
        border: 1px solid #000;
    }

    /**************/
    .btn-thongtin {
        margin-bottom: 10px;
    }

    .btn-cauhoi.choose {
        background-color: #FFC107;
        border-color: #FFC107 !important;
        color: #fff;
    }

    .btn-outline-dark {
        color: #343a40 !important;
        border-color: #343a40 !important;
        background-color: #fff !important;
    }

    .btn-cauhoi {
        margin: 0.15em;
        margin-bottom: 0.3em;
        font-size: 1.2em;
        width: 2.7em;
    }


    .cautraloi {
        border-style: ridge;
        width: 90%;
        margin-bottom: 0.7em;
    }

    .mauxanh {
        font-weight: bold;
        color: #000099;
    }

    .maudo {
        color: red;
    }

    .ndcauhoi {
        display: none;
    }

    input.question {
        display: inline-block !important;
        float: left;
        margin-right: 10px;
        cursor: pointer;
    }

    input.answer {
        display: inline-block !important;
        float: left;
        margin-right: 10px;
        cursor: pointer;
    }

    .text-number {
        margin: 0 !important;
    }

    .btn-primary {
        border-radius: 10.5px;
        font-size: 16px;
        background-color: #157eef;
        border-color: #157eef;
    }

    .topnav {
        overflow: hidden;
        background-color: #34a853;
        margin: 20px 0 10px;
        border-radius: 0 15px;
    }

    .topnav a {
        float: left;
        display: block;
        color: #fff;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ffc902;
        color: black;
    }

    .topnav a.active {
        background-color: #ffc902;
        color: #fff;
    }

    .topnav .icon {
        display: none;
    }

    .panel-body-2 {
        padding: 15px;
        background-color: #104098;
        color: #fff;
    }

    @media screen and (max-width: 600px) {
        .topnav a:not(:first-child) {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }
</style> --}}
