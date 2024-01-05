<!-- resources/views/siswa/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Absensi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('absensi.update', $data->absensisiswa_id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <select class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">
                                    <option value="Hadir" {{ $data->keterangan === 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="Sakit" {{ $data->keterangan === 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                    <option value="Alpha" {{ $data->keterangan === 'Alpha' ? 'selected' : '' }}>Alpha</option>
                                </select>
                            </div>

                            <!-- Query untuk mendapatkan absensi_tanggal dari database -->
                            @php
                                $absensi_tanggal = \DB::table('absensi')->where('absensi_id', $data->absensi_id)->value('absensi_tanggal');
                            @endphp

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Absensi</label>
                                <input type="date" class="form-control @error('absensi_tanggal') is-invalid @enderror" name="absensi_tanggal" value="{{ $absensi_tanggal }}">
                            </div>
                         
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
