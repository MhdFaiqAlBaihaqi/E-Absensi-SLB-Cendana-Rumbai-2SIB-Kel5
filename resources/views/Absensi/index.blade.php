@extends('layouts/main')
@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">


                    <div class="card-body">
                    <a href="{{ route('Absensi.create') }}" class="btn btn-md btn-success mb-3">TAMBAH FORMULIR</a>

                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="NO: activate to sort column descending">NO</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="NAMA: activate to sort column ascending">NAMA</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="KETERANGAN: activate to sort column ascending">KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($data as $key => $absensi)
                                <tr class= "odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $key + 1 }}</td>
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $absensi->nama }}</td>
                                    <td class="dtr-control sorting_1" tabindex="0">{{ $absensi->keterangan }}</td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data formulir belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
    <script>
        // message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

@endsection

@section('css')
<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('js')
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ url('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ url('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ url('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

@endsection