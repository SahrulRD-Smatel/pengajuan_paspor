<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\PengurusanController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::resource('pendaftar', PendaftarController::class);
Route::resource('daftar-ulang', DaftarUlangController::class);
Route::resource('pengurusan', PengurusanController::class);
