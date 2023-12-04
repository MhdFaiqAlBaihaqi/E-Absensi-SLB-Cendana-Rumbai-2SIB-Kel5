<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// jQuery main page
Route::get('/jquery', function () {
    return view('jquery.main');
});

// User resource routes
Route::resource('/user', UserController::class);

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// Alias for user index
Route::get('/index', [UserController::class, 'index'])->name('user.index');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::resource('/siswa',\App\Http\Controllers\SiswaController::class);