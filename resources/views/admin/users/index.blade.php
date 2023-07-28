@extends('admin.layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách thành viên</h3>
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
                                                        Tên thành viên</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Email</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Quản trị viên</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Hoạt động</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Địa chỉ</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Số điện thoại</th>
                                                    <th tabindex="0" rowspan="1" colspan="1">
                                                        Hành động</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['users'] as $key => $item)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            {{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>
                                                            @if ($item->isAdmin)
                                                               <span class="badge badge-pill badge-primary pt-2 pb-2 text-center">Có</span>
                                                            @else
                                                                <span class="badge badge-pill badge-danger pt-2 pb-2">Không</span>
                                                            @endif
                                                            
                                                        </td>
                                                        <td>
                                                            @if ($item->isActive)
                                                                <span class="badge badge-pill badge-primary pt-2 pb-2">Có</span>

                                                            @else
                                                                <span class="badge badge-pill badge-danger pt-2 pb-2">Không</span>

                                                            @endif
                                                            
                                                        </td>
                                                        <td>{{ $item->address }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>
                                                            <form
                                                                action="{{ route('admin.users.destroy', ['user' => $item]) }}"
                                                                method="POST">
                                                                <a class="btn btn-success"
                                                                    href="{{ route('admin.users.edit', ['user' => $item]) }}"><i
                                                                        class="fas fa-edit"></i></a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc muốn xóa nhãn hàng?')"><i
                                                                        class="far fa-trash-alt"></i></button>
                                                            </form>
                                                        
                                                        </td>
                                                    </tr>
                                                @endforeach




                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">STT</th>
                                                    <th rowspan="1" colspan="1">Tên thành viên</th>
                                                    <th rowspan="1" colspan="1">Email</th>
                                                    <th rowspan="1" colspan="1">Quản trị viên</th>
                                                    <th rowspan="1" colspan="1">Hoạt động</th>
                                                    <th rowspan="1" colspan="1">Địa chỉ</th>
                                                    <th rowspan="1" colspan="1">Số điện thoại</th>
                                                    <th rowspan="1" colspan="1">Hành động</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">

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
