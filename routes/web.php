<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\KreteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\NormalisasiController;

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


Route::get('/', [HasilController::class, 'tampilUser']);
Auth::routes();

Route::get('/alternatif', function () {
    return view('alternatif');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kreteria', [KreteriaController::class, 'index'])->name('kreteria');
Route::get('/kreteria/tambah', [KreteriaController::class, 'create'])->name('add_kreteria');
Route::post('/kreteria/store', [KreteriaController::class, 'store']);
Route::get('/kreteria/{id}/delete', [KreteriaController::class, 'delete'])->name('delete_kreteria');
Route::get('/kreteria/{id}/edit', [KreteriaController::class, 'edit'])->name('edit_kreteria');
Route::put('/kreteria/{id}', [KreteriaController::class, 'update'])->name('update_kreteria');


Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');
Route::get('/alternatif/tambah', [\App\Http\Controllers\AlternatifController::class, 'create'])->name('add_alternatif');
Route::post('/alternatif/store', [AlternatifController::class, 'store']);
Route::get('/alternatif/{id}/delete', [AlternatifController::class, 'delete'])->name('delete_alternatif');
Route::get('/alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('edit_alternatif');
Route::put('/alternatif/{id}', [AlternatifController::class, 'update'])->name('update_alternatif');

Route::get('/hasil', [HasilController::class, 'calculateSAW'])->name('hasil');
Route::get('/normalisasi', [NormalisasiController::class, 'calculateSAW'])->name('hasil');
