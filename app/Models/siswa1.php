<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa1 extends Model
{
// Nama tabel di database
protected $table = 'siswa1';

// Kolom-kolom yang dapat diisi
protected $fillable = ['id', 'nama_siswa', 'kelas'];

// Optional: Atur primary key jika nama primary key bukan 'id'
protected $primaryKey = 'id';

// Optional: Nonaktifkan timestamps (created_at dan updated_at)
public $timestamps = false;
}