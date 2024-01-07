@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @section('css')
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endsection
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #007bff;
            color: #ffffff;
            border-bottom: 0;
        }

        .btn-container {
            margin-bottom: 15px;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        .table {
            background: #ffffff;
            border: 1px solid #dee2e6;
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            text-align: center;
        }

        .alert {
            border-radius: 0;
            text-align: center;
            font-size: 18px;
        }

        .btn-success {
            background: #28a745;
            border: 0;
        }

        .btn-danger {
            background: #dc3545;
            border: 0;
        }

        /* Additional styles for centering text in specific cells */
        .center-text {
            text-align: center;
        }
        .kelas-column {
        width: 10%;
    }

    .wali-kelas-column {
        width: 10%;
    }

    .nama-siswa-column {
        width: 25%; /* Adjust the width based on your preference */
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Data History Absensi</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="absensi-table">
                            <?php
                                $userRole = Auth::user()->role;
                                $isAdminWithFullAccess = ($userRole == 'admin' || $userRole == 'Admin');
                                $dataAbsensi = DB::table('absensi_siswa')
                                ->join('siswa1', 'absensi_siswa.id_siswa', '=', 'siswa1.id')
                                ->join('absensi', 'absensi_siswa.absensi_id', '=', 'absensi.absensi_id')
                                ->join('kelas', 'siswa1.kelas', '=', 'kelas.id')
                                ->join('users', 'users.kelas', '=', 'kelas.id') // Sesuaikan dengan kolom yang sesuai
                                ->select(
                                    'absensi_siswa.absensisiswa_id',
                                    'siswa1.nama_siswa',
                                    'absensi.absensi_tanggal',
                                    'absensi_siswa.keterangan',
                                    'absensi.absensi_keterangan',
                                    'kelas.kelas',
                                    'users.name' // Ambil kolom 'name' dari tabel 'users'
                                );
                                $dataAbsensi = $dataAbsensi->get();

                                if (!$isAdminWithFullAccess) {
                                    $classId = Auth::user()->kelas;
                                    $dataAbsensi->where('siswa1.kelas', $classId);
                                }

                                // Membuat array untuk menyimpan data absensi
                                $absensiData = [];

                                // Mengisi data absensi pada setiap tanggal
                                foreach ($dataAbsensi as $absensi) {
                                    $absensiData[$absensi->absensi_tanggal][$absensi->nama_siswa] = $absensi->keterangan;
                                }
                            ?>

                            <table border="1" style="width: 100%;">
                                <tr>
                                    <td colspan="7" align="center"><strong>YAYASAN PENDIDIKAN CENDANA RIAU</strong></td>
                                    <td colspan="34"></td>
                                </tr>
                                <tr>
                                    <td colspan="7" align="center"><strong>SLB CENDANA PEKANBARU</strong></td>
                                    <td colspan="34"></td>
                                </tr>
                                <tr>
                                    <td colspan="7" align="center"><strong>DAFTAR HADIR SISWA TATAP MUKA</strong></td>
                                    <td colspan="34"></td>
                                </tr>
                                <tr>
                                <td>BULAN : {{ \Carbon\Carbon::now()->format('F Y') }}</td>


                                    <td></td>
                                    <td></td>
                                    <td colspan="31" align="center">Tanggal</td>
                                    <td colspan="3" class="center-text">Jumlah</td>
                                    <td colspan="31"></td>
                                </tr>
                             <tr>
    <td rowspan="4">KELAS</td>
    <td rowspan="4">WALI KELAS</td>
    <td rowspan="4">NAMA SISWA</td>
    
    <!-- Loop for days -->
    @for ($day = 1; $day <= 31; $day++)
        <td>{{ $day }}</td>
    @endfor
    
    <td>S</td>
    <td>I</td>
    <td>H</td>
</tr>

                           <!-- ... Your table header ... -->
<tbody>
    @php
        $uniqueSiswaNames = $dataAbsensi->pluck('nama_siswa')->unique();
    @endphp

    @forelse($uniqueSiswaNames as $siswaName)
        <tr>
            <td>{{ $dataAbsensi->where('nama_siswa', $siswaName)->first()->kelas }}</td>
            <td>{{ $dataAbsensi->where('nama_siswa', $siswaName)->first()->name }}</td>
            <td>{{ $siswaName }}</td>
            <td>{{ $dataAbsensi->where('nama_siswa', $siswaName)->first()->keterangan }}</td>

            <!-- Loop for days -->
            @for ($day = 1; $day <= 31; $day++)
                <td>
                    @php
                        // Format the day with leading zero if needed
                        $formattedDay = sprintf("%02d", $day);

                        // Create the date string in 'Y-m-d' format
                        $currentDate = "2023-10-$formattedDay";

                        // Check if there is data for the current day
                        $attendanceForDay = isset($absensiData[$currentDate][$siswaName]) ? $absensiData[$currentDate][$siswaName] : null;
                    @endphp

                    @if ($attendanceForDay)
                        {{ $attendanceForDay }}
                    @else
                        <!-- If no data, display empty -->
                        -
                    @endif
                </td>
            @endfor

            <td></td>

            <td></td>
        </tr>
    @empty
        <tr>
            <td colspan="{{ !$isAdminWithFullAccess ? '40' : '39' }}" class="text-center">
                <div class="alert alert-danger">
                    Data absensi belum tersedia.
                </div>
            </td>
        </tr>
    @endforelse
</tbody>
<!-- ... Your table footer ... -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</body>

</html>

@endsection

@section('css')
<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
