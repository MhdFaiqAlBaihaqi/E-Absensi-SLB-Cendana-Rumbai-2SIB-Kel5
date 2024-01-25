
@extends('layouts/main')

@section('content')

    <div class="container-fluid mt-6 mb-6">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card shadow rounded">
                    <div class="card-body">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 font-weight-bold">Edit Siswa</h4>
                    </div>
                        <form action="{{ route('siswa.update', $data->id) }}" method="post">

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama_siswa" value="{{ $data->nama_siswa }}" required>
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
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" required>{{ $data->alamat }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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
                margin-bottom: 29px;
            }

            .btn-primary,
            .btn-warning {
                padding: 12px;
            }
        </style>

    @endsection
@endsection
