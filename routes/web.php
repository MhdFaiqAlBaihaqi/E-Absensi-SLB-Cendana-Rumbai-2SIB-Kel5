<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

use App\Http\Controllers\AbsensiController;

Route::get('/absensi', [AbsensiController::class, 'index']);


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/jquery', function () {
    return view('jquery.main');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/absensi_input/{id?}', [AbsensiController::class, 'input_absensi'])->name('input');

Route::resource('/siswa',\App\Http\Controllers\SiswaController::class);
Route::resource('/absensi',\App\Http\Controllers\AbsensiController::class);
Route::resource('/user',\App\Http\Controllers\UserController::class);
Route::resource('/user', UserController::class);
Route::get('/showUser', [UserController::class, 'showUser'])->name('user.showUser');
Route::get('Rekap', [AbsensiController::class, 'Rekap'])->name('absensi.Rekap');
Route::get('history', [AbsensiController::class, 'history'])->name('absensi.history');
Route::get('/showSiswa', [SiswaController::class, 'showSiswa'])->name('siswa.showSiswa');

Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

