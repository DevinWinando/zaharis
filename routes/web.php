<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\FasilitasController;

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

Route::get('/', [ClientController::class, 'index']);

Route::get('/kamar/pesan', [ClientController::class, 'showReservationForm']);
Route::post('/kamar/pesan', [ClientController::class, 'reservation']);
Route::get('/tipe-kamar/{id}', [ClientController::class, 'tipe']);

Route::get('/reservasi/{reservasi}', [ClientController::class, 'receipt']);

Route::middleware(['auth'])->group(function(){
    Route::get('/admin/dashboard', [KamarController::class, 'index']);
    Route::resource('/admin/kamar', KamarController::class);
    Route::resource('/admin/tipe-kamar', TipeKamarController::class);
    Route::resource('/admin/fasilitas', FasilitasController::class);

    Route::get('/resepsionis/reservasi', [ReservasiController::class, 'index']);
    Route::post('/resepsionis/reservasi', [ReservasiController::class, 'proses']);

    Route::get('/admin/logout', [AuthController::class, 'logout']);
});

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);