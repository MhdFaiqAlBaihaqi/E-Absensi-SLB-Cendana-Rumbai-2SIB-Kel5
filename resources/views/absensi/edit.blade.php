<!-- resources/views/absensi/edit.blade.php -->

<h2>Edit Absensi</h2>

<form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="siswa_id">Siswa:</label>
        <select name="siswa_id" id="siswa_id" class="form-control">
            @foreach($siswa as $item)
                <option value="{{ $item->id }}" {{ $absensi->siswa_id == $item->id ? 'selected' : '' }}>{{ $item->nama_siswa }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status_absensi">Status Absensi:</label>
        <select name="status_absensi" id="status_absensi" class="form-control">
            <option value="1" {{ $absensi->status_absensi ? 'selected' : '' }}>Sudah Absen</option>
            <option value="0" {{ !$absensi->status_absensi ? 'selected' : '' }}>Belum Absen</option>
        </select>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" class="form-control" value="{{ $absensi->keterangan }}">
    </div>
    <div class="form-group">
        <label for="tanggal_absensi">Tanggal Absensi:</label>
        <input type="date" name="tanggal_absensi" class="form-control" value="{{ $
