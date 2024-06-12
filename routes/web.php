<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Models\Mahasiswa;

Route::get('/', function () {
    $data =['nama' => "shinta", 'foto' =>'Foto Sinta.jpeg'];
    return view('dashboard', compact ('data')); 
});

Route::get('/mahasiswa', function () {
    $data = ['nama' => "shinta", 'foto' =>'Foto Sinta.jpeg'];
    return view('mahasiswa', compact ('data')); 
});

Route::resource('/prodi', ProdiController::class);
Route::resource('/mahasiswa', MahasiswaController::class);
