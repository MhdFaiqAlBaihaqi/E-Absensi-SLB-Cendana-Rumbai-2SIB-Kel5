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

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-welcome {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
        }

        .absensi-table {
            margin-top: 20px;
        }

        .absensi-btn-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                    <h1 class="user-welcome">Selamat Datang, {{ Auth::user()->name }}!</h1>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Data Siswa</h3>
                   
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

                <div class="absensi-btn-container">
                    <?php
                        $kelas = DB::select(DB::raw("select * from kelas where id = ".Auth::user()->kelas));
                        $isAdmin = Auth::user()->role == 'admin';
                        $kelas = $isAdmin ? DB::select(DB::raw("select * from kelas")) : DB::select(DB::raw("select * from kelas where id = ".Auth::user()->kelas));
                    ?>
                    @forelse ($kelas as $val)
                        <a href="{{ url('absensi_input/'.$val->id) }}" class="btn btn-primary">{{ $val->kelas }} - Input Absen</a>
                    @empty
                        <div class="alert">
                            Data absensi belum tersedia.
                        </div>
                    @endforelse
                </div>
                <div class="absensi-table">
    <?php
       

            $classId = Auth::user()->kelas;
            $dataSiswa = DB::table('siswa1')
                ->join('kelas', 'siswa1.kelas', '=', 'kelas.id')
                ->where('siswa1.kelas', $classId)
                ->select(
                    'siswa1.id',
                    'siswa1.nama_siswa',
                    'siswa1.jenis_kelamin',
                    'siswa1.alamat',
                    'kelas.kelas as nama_kelas'
                )
                ->get();      
    ?>
   <table class="table table-bordered" >
    <thead>
        <tr>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            @if(auth()->user()->role !== 'guru')
                <th scope="col">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($dataSiswa as $siswa)
            <tr>
                <td>{{ $siswa->nama_siswa }}</td>
                <td>{{ $siswa->nama_kelas }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->alamat }}</td>
                @if(auth()->user()->role !== 'guru')
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="post">
                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    <div class="alert alert-info">
                        Data siswa belum tersedia.
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- ... (your existing scripts) ... -->
</body>
</html>

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
