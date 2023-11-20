<?php 
// app/Models/Siswa.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa1'; // Adjust based on your actual table name
    protected $fillable = ['nama_siswa', 'kelas', 'jenis_kelamin', 'alamat'];
}