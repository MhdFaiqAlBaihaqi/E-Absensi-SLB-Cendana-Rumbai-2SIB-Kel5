<!DOCTYPE html>
<html lang="en" style="height: auto;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">

    @yield('css')
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                   
                    <div class="info">
                        <h2 class="user-welcome text-white">{{ Auth::user()->name }}</h2>
                    </div>
                </div>

                @if(auth()->user()->role !== 'guru')
    <a class="nav-link" href="{{ route('user.showUser') }}">
        <button class="btn btn-block btn-outline-light">
            <i class="fas fa-users"></i> Data User
        </button>
    </a>
    <a class="nav-link" href="{{ route('siswa.showSiswa') }}">
        <button class="btn btn-block btn-outline-light">
            <i class="fas fa-user-graduate"></i> Data Siswa
        </button>
    </a>
    <div class="row mb-2">
    <div class="col-md-12">
        <a class="nav-link" href="{{ route('absensi.history') }}">
            <button class="btn btn-block btn-outline-light">
                <i class="fas fa-history"></i> History 
            </button>
        </a>
    </div>
</div> 
<a class="nav-link" href="{{ route('absensi.Rekap') }}">
        <button class="btn btn-block btn-outline-light">
            <i class="fas fa-chart-bar"></i> Rekap
        </button>
    </a>

 
@endif

@if(auth()->user()->role == 'guru')
    @php
        $kelas = Auth::user()->role == 'admin' ? DB::select(DB::raw("SELECT * FROM kelas")) : DB::select(DB::raw("SELECT * FROM kelas WHERE id = ".Auth::user()->kelas));
    @endphp

    @forelse ($kelas as $val)
        <div class="row mb-2">
            <div class="col-md-12">
                <a class="nav-link" href="{{ url('absensi_input/'.$val->id) }}">
                    <button class="btn btn-block btn-outline-light">
                        <i class="fas fa-edit"></i> Input Absen
                    </button>
                </a>
            </div>
        </div>
        <a class="nav-link" href="{{ route('absensi.history') }}">
        <button class="btn btn-block btn-outline-light">
            <i class="fas fa-history"></i> History
        </button>
    </a>
      
    @empty
        <div class="alert">
            Data absensi belum tersedia.
        </div>
    @endforelse
@endif



<div class="row mb-2">
    <div class="col-md-12">
        <a class="nav-link" href="{{ route('logout') }}">
            <button class="btn btn-block btn-outline-light">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </a>
    </div>
</div>


            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1604.8px;">
            <!-- Content Header (Page header) -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer no-print">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="display: none;">
            <!-- Control sidebar content goes here -->
            <div class="p-3 control-sidebar-content" style="">
                <h5>Customize AdminLTE</h5>
                <hr class="mb-2">
                <!-- ... (your existing customization options) ... -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <div id="sidebar-overlay"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('dist/js/demo.js') }}"></script>

    @yield('js')
</body>

</html>
