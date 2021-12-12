<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\TiketController;
use App\Models\Jadwal;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix'=>'/'], function(){
    Route::get('/', [ClientController::class, 'index']);
    Route::post('/cari_tiket', [ClientController::class, 'cari'])->name('cari_tiket');
    Route::get('/cari_resi', [ClientController::class, 'cari_resi'])->name('cari_resi');
});

Route::get('/cari_tiket/{slug_jadwal}/{penumpang}/pesan', [ClientController::class, 'pesan']);
Route::post('/cari_tiket/{slug_jadwal}/{penumpang}/pesan/checkout', [ClientController::class, 'checkout']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => '/home'], function($kode_pembayaran){
    Route::get('tujuan', [TujuanController::class, 'index_tujuan']);
    Route::post('tujuan/add_tujuan', [TujuanController::class, 'add_tujuan']);

    Route::get('tiket', [TiketController::class, 'index_tiket']);
    Route::post('tiket/cari', [TiketController::class, 'cari'])->name('cari');

    Route::get('jadwal', [JadwalController::class, 'index_jadwal'])->name('jadwal');
    Route::post('jadwal/up_jadwal', [JadwalController::class, 'up_jadwal'])->name('up_jadwal');

    Route::get('pemesan', [TiketController::class, 'pemesan'])->name('pemesan');
    Route::get('pemesan/{kode_pembayaran}/success', [TiketController::class, 'success'])->name('success', $kode_pembayaran );
});

Route::get('/home/tiket/cari/{slug_jadwal}/{penumpang}/pesan', [TiketController::class, 'pesan']);
Route::post('/home/tiket/cari/{slug_jadwal}/{penumpang}/pesan/checkout', [TiketController::class, 'checkout']);
