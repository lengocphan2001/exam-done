@extends('user.layout')

@section('content')
    <div class="container mt-5">
        <div class="row col-15 mt-5 flex d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-15 col-sm-15 col-xs-15 card p-5">
                <div class="panel panel-default hidden-sm hidden-xs">
                    <div class="panel-body flex d-flex flex-column justify-content-center align-items-center">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên bài thi</th>
                                    <th scope="col">Số câu trả lời đúng</th>
                                    <th scope="col">Kết quả</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['exams'] as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->correct_answer }}</td>
                                        <td>
                                            @if ($item->correct_answer >= 21)
                                                <p style="text-align:center"><span
                                                        style="color: #0000ff; font-family: arial, helvetica, sans-serif;"><strong
                                                            class="text-success">Qua</strong></span></p>
                                            @else
                                                <p style="text-align:center"><span
                                                        style="color: #0000ff; font-family: arial, helvetica, sans-serif;"><strong
                                                            class="text-danger">Trượt</strong></span></p>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.users.destroy', ['user' => $item]) }}"
                                                method="POST">
                                                <a class="btn btn-success"
                                                    href="{{ route('admin.users.edit', ['user' => $item]) }}"><i
                                                        class="fas fa-edit"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
