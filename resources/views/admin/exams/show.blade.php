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
        <a class="btn btn-success mb-4 ml-2" href="{{ route('exams.index') }}"><i class="fas fa-angle-left mr-2"></i>Quay
            lại</a>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-6">
                    <!-- general form elements -->
                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Thông tin chi tiết</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Tên bài thi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="name" readonly>{{ $data['exam']->name }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="sel1">Thời lượng thi</label>
                                <input type="number" name="duration" class="form-control" disabled
                                    value="{{ $data['exam']->duration }}" />
                            </div>
                            <div class="form-group">

                                <label for="sel1">Độ khó</label>
                                <select class="form-control" id="sel1" name="difficulty" disabled>
                                    <option value="Dễ"
                                        selected="{{ $data['exam']->difficulty === 'Dễ' ? 'selected' : '' }}">Dễ
                                    </option>
                                    <option value="Trung bình"
                                        selected="{{ $data['exam']->difficulty === 'Trung bình' ? 'selected' : '' }}">
                                        Trung bình</option>
                                    <option value="Khó"
                                        selected="{{ $data['exam']->difficulty === 'Khó' ? 'selected' : '' }}">Khó
                                    </option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-6">

                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Danh sách câu hỏi</h3>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        STT</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Tên câu hỏi</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Thể loại</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Độ khó</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Hành động</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['exam']->questions as $key => $item)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            {{ $loop->iteration }}</td>
                                                        <td>{{ Question::where('id', $item->question_id)->first()->name }}</td>
                                                        <td>{{ Question::where('id', $item->question_id)->first()->type }}</td>
                                                        <td>{{ Question::where('id', $item->question_id)->first()->difficulty }}</td>
                                                        <td>

                                                            <a href="{{ route('questions.show', ['question' => Question::where('id', $item->question_id)->first()]) }}"
                                                                class="btn btn-info"><i class="far fa-eye"></i></a>

                                                            </form>
                                                            {{-- <a class="btn btn-primary"
                                                                href="{{ route('questions.show', ['question' => $item]) }}"><i
                                                                    class="far fa-eye"></i></a>

                                                            <a class="btn btn-danger"
                                                                href="{{ route('questions.destroy', ['question' => $item]) }}"><i
                                                                    class="far fa-trash-alt"></i></a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach




                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">STT</th>
                                                    <th rowspan="1" colspan="1">Tên câu hỏi</th>
                                                    <th rowspan="1" colspan="1">Thể loại</th>
                                                    <th rowspan="1" colspan="1">Độ khó</th>
                                                    <th rowspan="1" colspan="1">Hành động</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
