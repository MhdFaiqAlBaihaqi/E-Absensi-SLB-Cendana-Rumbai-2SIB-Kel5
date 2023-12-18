<!-- resources/views/absensi/edit.blade.php -->

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
                        <form action="{{ route('absensi.update', $data->absensi_id) }}" method="post">

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" class="form-control" name="absensi_kelas" value="{{ $data->absensi_kelas }}" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" class="form-control" name="absensi_tanggal" value="{{ $data->absensi_tanggal }}" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="absensi_keterangan" required>{{ $data->absensi_keterangan }}</textarea>
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
