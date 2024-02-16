<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;

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

// Login Route
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'] )->middleware('auth');
Route::resource('/berkas', BerkasController::class)->middleware('auth');

Route::post('/change-password', [ProfileController::class, 'change_password'])->name('password.change')->middleware('auth');
Route::resource('/profile', ProfileController::class)->middleware('auth');

Route::resource('/pegawai', PegawaiController::class)->middleware('admin');

Route::get('/get-jabatan-by-bidang/{bidangId}', [JabatanController::class, 'getByBidang']);
Route::get('/berkas/{id}/download/{berkas}', [BerkasController::class, 'downloadBerkas'])->name('berkas.download');

