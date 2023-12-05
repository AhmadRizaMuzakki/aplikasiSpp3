<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\export\SppExport;
use App\Http\Controllers\export\SiswaExport;
use App\Http\Controllers\Admin\SppController;
use App\Http\Controllers\export\KelassExport;
use App\Http\Controllers\export\PetugasExport;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\PetugasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', function () {
    Session::flush();
    Auth::logout();

    return Redirect('login');
});

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// siswa
Route::resource('/data-siswa', SiswaController::class);
Route::post('/data-siswa-tambah', [SiswaController::class, 'store']);
Route::get('/data-siswa.edit', [SiswaController::class, 'edit']);
Route::put('/data-siswa.update', [SiswaController::class, 'update']);
Route::delete('/data-siswa.destroy', [SiswaController::class, 'destroy']);
// petugas
Route::resource('/data-petugas', PetugasController::class);
Route::post('/data-petugas-tambah', [PetugasController::class, 'store']);
Route::get('/data-petugas.edit', [PetugasController::class, 'edit']);
Route::put('/data-petugas.update', [PetugasController::class, 'update']);
Route::delete('/data-petugas.destroy', [PetugasController::class, 'destroy']);
// spp
Route::resource('/data-spp', SppController::class);
Route::get('/data-spp.edit', [SppController::class, 'edit']);
Route::put('/data-spp.update', [SppController::class, 'update']);
// kelas
Route::resource('/data-kelas', KelasController::class);
Route::post('/data-kelas-tambah', [KelasController::class, 'store']);
Route::get('/data-kelas.edit', [KelasController::class, 'edit']);
Route::put('/data-kelas.update', [KelasController::class, 'update']);
Route::delete('/data-Kelas.destroy', [KelasController::class, 'destroy']);

// export data siswa
Route::get('/siswaExport', [SiswaExport::class, 'export']);
Route::get('/petugasExport', [petugasExport::class, 'export']); //
Route::get('/kelasExport', [KelassExport::class, 'export']); //
Route::get('/sppExport', [SppExport::class, 'export']); //
