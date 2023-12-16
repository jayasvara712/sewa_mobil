<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use Illuminate\Support\Facades\Route;

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

//Halaman Admin
Route::get('/admin', [DashboardController::class, 'index'])->middleware('admin');
Route::resource('/admin/mobil', MobilController::class)->middleware('admin');
Route::resource('/admin/peminjaman', PeminjamanController::class)->middleware('admin');

// Hlaman User
Route::get('/user', [DashboardController::class,'home'])->middleware('user');
Route::get('/user/sewa', [PeminjamanController::class,'home'])->middleware('user');
Route::resource('/user/peminjaman', PeminjamanController::class)->middleware('user');
Route::resource('/user/pengembalian', PengembalianController::class)->middleware('user');

//Login
Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
