@extends('layouts/main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 font-weight-bold">Tambah Siswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    name="nama_siswa" placeholder="Nama Siswa">
                                @error('nama_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <?php $kelas = DB::select(DB::raw("select * from kelas")); ?>
                                <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                    <div class="invalid-feedback">
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
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <button type="reset" class="btn btn-warning btn-block">Reset</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('css')
        @parent
        <style>
            .card-header {
                border-bottom: 0;
            }

            .form-group {
                margin-bottom: 25px;
            }

            .btn-primary,
            .btn-warning {
                padding: 12px;
            }
        </style>
    @endsection
@endsection
