<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/mahasiswa');     
});

Route::resource('mahasiswa', MahasiswaController::class);
//Tugas 3 Search
Route::get('/search', [MahasiswaController::class,'search'])->name('mahasiswa.search');

//ORM dengan relasi
Route::get('/nilai/{id}', [MahasiswaController::class,'nilai'])->name('nilai');

//cetakKhs
Route::get('/nilai/{id}/cetak', [MahasiswaController::class, 'cetakKhs'])->name('mahasiswa.cetakKhs');