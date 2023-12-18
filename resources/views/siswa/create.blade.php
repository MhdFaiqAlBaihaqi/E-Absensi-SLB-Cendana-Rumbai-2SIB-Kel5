@extends('layouts/main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    name="nama_siswa" placeholder="Nama Siswa">
                                @error('nama_siswa')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>

                                <?php 
                                      $kelas =DB::select(DB::raw("select * from kelas"));
                                ?>
                                <select name="kelas" class="form-control" @error('kelas') is-invalid @enderror">
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id}}">{{ $item->kelas}}</option>
                                @endforeach
                            </select>
                              
                                @error('kelas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                    placeholder="Alamat"></textarea>
                                @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('css')
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

            .card-body {
                background-color: #ffffff;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .font-weight-bold {
                color: #333333;
            }

            .btn-primary {
                background-color: #007bff;
                border: 0;
            }

            .btn-warning {
                background-color: #ffc107;
                border: 0;
            }

            .alert {
                border-radius: 0;
                text-align: center;
                font-size: 18px;
            }
        </style>
    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
