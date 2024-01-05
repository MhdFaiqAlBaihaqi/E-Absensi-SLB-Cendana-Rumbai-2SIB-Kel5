@extends('layouts/main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('absensi.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Kelas Siswa</label>
                                <input type="text" class="form-control @error('absensi_kelas') is-invalid @enderror"
                                    name="absensi_kelas" placeholder="Kelas Siswa" readonly value="{{$kelas[0]->kelas}}">
                                @error('absensi_kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal</label>
                                <input type="date" class="form-control @error('absensi_tanggal') is-invalid @enderror"
                                    name="absensi_tanggal">
                                @error('absensi_tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    @foreach ($siswa as $item)
                                        <div class="col-md-6">
                                            <label class="font-weight-bold">Nama Siswa</label>
                                            <input type="hidden" name="siswa_id[]" id="" readonly class="form-control"
                                                value="{{ $item->id }}">
                                            <input type="text" name="nama_siswa" id="" readonly class="form-control"
                                                value="{{ $item->nama_siswa }}">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Keterangan</label>
                                                <select
                                                    class="form-control @error('absensi_keterangan') is-invalid @enderror"
                                                    name="absensi_keterangan_kehadiran[]">
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Alpha">Alpha</option>
                                                </select>
                                                @error('absensi_keterangan')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Mapel</label>
                                <textarea name="absensi_keterangan" id="" class="form-control"></textarea>
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
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }

            .card-body {
                background-color: #ffffff;
            }

            .form-group {
                margin-bottom: 25px;
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

            textarea {
                resize: vertical;
            }
        </style>
    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
