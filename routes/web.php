<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
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


Route::group(['prefix' => '/home'], function($kode_pembayaran = null, $id = null){
    Route::get('tujuan', [TujuanController::class, 'index_tujuan'])->middleware('can:isAdmin');
    Route::post('tujuan/add_tujuan', [TujuanController::class, 'add_tujuan'])->middleware('can:isAdmin');

    Route::get('/home/tujuan/{id}/hapus_tujuan', [TujuanController::class, 'hapus_tujuan'])->middleware('can:isAdmin')->name('hapus_tujuan', $id);

    Route::get('tiket', [TiketController::class, 'index_tiket']);
    Route::post('tiket/cari', [TiketController::class, 'cari'])->name('cari');

    Route::get('jadwal', [JadwalController::class, 'index_jadwal'])->name('jadwal')->middleware('can:isAdmin');
    Route::post('jadwal/up_jadwal', [JadwalController::class, 'up_jadwal'])->name('up_jadwal')->middleware('can:isAdmin');
    Route::get('jadwal/{id}/hapus_jadwal', [JadwalController::class, 'hapus_jadwal'])->name('hapus_jadwal', $id);

    Route::get('pemesan', [TiketController::class, 'pemesan'])->name('pemesan');
    Route::get('pemesan/{kode_pembayaran}/success', [TiketController::class, 'success'])->name('success', $kode_pembayaran );
    Route::get('pemesan/{kode_pembayaran}/hapus_pembayaran', [TiketController::class, 'hapus_pembayaran'])->name('hapus_pembayaran', $kode_pembayaran);
    Route::get('pemesan/{kode_pembayaran}/reset_pembayaran', [TiketController::class, 'reset_pembayaran'])->name('reset_pembayaran', $kode_pembayaran);


    Route::get('akun', [HomeController::class, 'akun'])->name('akun');
    Route::post('akun/tambah_akun', [HomeController::class, 'tambah_akun'])->name('tambah_akun');
    Route::get('akun/{id}/hapus', [HomeController::class, 'hapus_akun'])->name('hapus_akun')->middleware('can:isAdmin');;
});

Route::get('/home/tiket/cari/{slug_jadwal}/{penumpang}/pesan', [TiketController::class, 'pesan']);
Route::post('/home/tiket/cari/{slug_jadwal}/{penumpang}/pesan/checkout', [TiketController::class, 'checkout']);



Route::group(['prefix' => '/home'], function(){
    Route::get('cek_pesananmu', [TiketController::class, 'cek_pesananmu'])->name('cek_pesananmu');
});