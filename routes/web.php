<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {

    Route::controller(AuthController::class)->group(function () {

        Route::get('/login', 'index')->name('login');
        Route::post('/proses_login', 'proses_login');
        Route::get('/pendaftaran', 'pendaftaran');
        Route::post('/proses_pendaftaran', 'proses_pendaftaran');
    });
});

Route::middleware('auth')->group(function () {

    Route::resource('app', AppController::class);
    Route::get('/cetak_pdf', [AppController::class, 'cetak_pdf']);
    Route::get('/nama_jabatan/{nama_jabatan}', [AppController::class, 'jabatan_karyawan'])->name('nama_jabatan');

    Route::get('/logout', [AuthController::class, 'logout']);
});
