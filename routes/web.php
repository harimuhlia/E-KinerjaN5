<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TupoksiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SkputamaController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\AktifitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkptambahanController;
use App\Http\Controllers\ValidasiguruController;
use App\Http\Controllers\InputaktifitasController;
use App\Http\Controllers\KategoriPelaporanController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route untuk bagian Dashboard
Route::get('/dashboard/admin', [DashboardController::class, 'DashboardAdmin'])->name('DashboardAdmin');
// Route::get('/dashboard/pengguna', [DashboardController::class, 'DashboardPengguna'])->name('DashboardPengguna');

//Route Untuk Data Master
Route::resource('/tahun', TahunController::class);
Route::resource('/tupoksi', TupoksiController::class);
Route::resource('/aktifitas', AktifitasController::class);
Route::resource('/timeline', TimelineController::class);

//Route Untuk Management Kegiatan
Route::resource('/managekegiatan', KegiatanController::class);

//Route Untuk Input SKP
Route::resource('/inputskputama', SkputamaController::class);
Route::resource('/inputskptambahan', SkptambahanController::class);

//Route Untuk Input Aktifitas
Route::resource('/inputaktifitas', InputaktifitasController::class);
Route::post('/inputaktifitas/aktifitas', [InputaktifitasController::class, 'aktifitas']);

//Route Untuk Validasi Kepsek ke guru
Route::resource('/validasiguru', ValidasiguruController::class);

Route::resource('aktifitas', KategoriPelaporanController::class);