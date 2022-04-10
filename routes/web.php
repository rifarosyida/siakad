<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', MahasiswaController::class);
//Tugas 3 Search
Route::get('/search', [MahasiswaController::class,'search'])->name('mahasiswa.search');

//ORM dengan relasi
Route::get('/nilai/{id}', [MahasiswaController::class,'nilai'])->name('nilai');