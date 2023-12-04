<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
public function up()
{
Schema::create('siswa', function (Blueprint $table) {
$table->id();
$table->string('nama');
$table->enum('jenis_kelamin', ['L', 'P']);
$table->string('kelas');
$table->text('alamat');
$table->timestamps();
});
}

public function down()
{
Schema::dropIfExists('siswa');
}
}