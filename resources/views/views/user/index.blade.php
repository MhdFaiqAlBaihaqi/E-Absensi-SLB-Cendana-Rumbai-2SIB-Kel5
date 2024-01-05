@extends('layouts/main')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data user</title>
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
    </style>
</head>

<body>
 

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
            
                    <div class="card-header">
                    <h1 class="user-welcome">Selamat Datang, {{ Auth::user()->name }}!</h1>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Data User</h3>
                            <div class="btn-container">
                            <a href="{{ route('user.create') }}" class="btn btn-light">
                                        <i class="fa fa-plus"></i> Tambah Data User
                                    </a>
                                    
                                  
                            </div>
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

                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role </th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                      
                                        <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $user->id) }}" method="post">
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <div class="alert">
                                                Data user belum tersedia.
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

        // message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

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
