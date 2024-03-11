<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/posts', \App\Http\Controllers\PostController::class);
Route::resource('/kategoris', \App\Http\Controllers\KategoriController::class);
Route::resource('/barangs', \App\Http\Controllers\BarangController::class);
Route::resource('/keranjangs', \App\Http\Controllers\KeranjangController::class);
Route::resource('/penggunas', \App\Http\Controllers\PenggunaController::class);