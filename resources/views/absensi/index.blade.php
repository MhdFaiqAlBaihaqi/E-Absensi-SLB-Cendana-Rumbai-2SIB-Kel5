<!-- resources/views/absensi/index.blade.php -->

<h2>Daftar Absensi</h2>
<a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Siswa</th>
            <th>Status Absensi</th>
            <th>Keterangan</th>
            <th>Tanggal Absensi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($absensi as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->siswa->nama_siswa }}</td>
                <td>{{ $item->status_absensi ? 'Sudah Absen' : 'Belum Absen' }}</td>
                <td>{{ $item->keterangan ?? '-' }}</td>
                <td>{{ $item->tanggal_absensi ?? '-' }}</td>
                <td>
                    <a href="{{ route('absensi.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('absensi.destroy', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus absensi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
