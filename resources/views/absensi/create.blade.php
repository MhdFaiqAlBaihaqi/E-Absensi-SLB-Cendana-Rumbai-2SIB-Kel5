<!-- resources/views/absensi/create.blade.php -->

<h2>Tambah Absensi</h2>

<form action="{{ route('absensi.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="siswa_id">Siswa:</label>
        <select name="siswa_id" id="siswa_id" class="form-control">
            @foreach($siswa as $item)
                <option value="{{ $item->id }}">{{ $item->nama_siswa }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status_absensi">Status Absensi:</label>
        <select name="status_absensi" id="status_absensi" class="form-control">
            <option value="1">Sudah Absen</option>
            <option value="0">Belum Absen</option>
        </select>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" class="form-control">
    </div>
    <div class="form-group">
        <label for="tanggal_absensi">Tanggal Absensi:</label>
        <input type="date" name="tanggal_absensi" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
