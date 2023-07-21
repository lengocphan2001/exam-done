@php
    use App\Models\Kind;
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
        <a class="btn btn-success mb-4 ml-2" href="{{ url()->previous() }}"><i class="fas fa-angle-left mr-2"></i>Quay
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
                                <label for="exampleFormControlTextarea1" class="form-label">Tên câu hỏi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="name" readonly>{{ $data['question']->name }}</textarea>
                            </div>





                            <div class="form-group">
                                <label for="sel1">Thể loại</label>
                                <input class="form-control" id="exampleFormControlTextarea1" readonly
                                    value="{{ Kind::where('id', $data['question']->kind_id)->first()->name }}" />
                            </div>
                            <div class="form-group">

                                <label for="sel1">Điểm liệt</label>
                                <input class="form-control" id="exampleFormControlTextarea1" readonly
                                    value="{{ $data['question']->is_paralysis == 1 ? 'Có' : 'Không' }}" />
                            </div>
                            <div class="form-group">

                                <label for="sel1">Số lượng câu trả lời</label>
                                <input class="form-control" id="exampleFormControlTextarea1" readonly
                                    value="{{ $data['question']->number_of_answers }}" />
                            </div>
                            <div class="form-group">

                                <label for="sel1">Đáp án đúng</label>
                                <input class="form-control" id="exampleFormControlTextarea1" readonly
                                    value="{{ $data['question']->answer }}" />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-6">

                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Danh sách câu trả lời</h3>
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
                                                        Câu trả lời</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['question']->answers as $key => $item)
                                                    <tr class="col">
                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            {{ $loop->iteration }}</td>
                                                        <td>{{ $item->answer }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">STT</th>
                                                    <th rowspan="1" colspan="1">Câu trả lời</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    @if ($data['question']->kind_id == 1 || $data['question']->kind_id == 2)
                        <div class="card-header">
                            <h3 class="card-title">Hình ảnh</h3>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img class="rounded mx-auto d-block img-thumbnail" name="image"
                                            src="{{ asset($data['question']->image) }}" />
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card card-primary">



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
    {{-- <script>
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
    </script> --}}
@endpush
