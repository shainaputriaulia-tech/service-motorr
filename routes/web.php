<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PelangganController, KendaraanController,
    DaftarServiceController, DataServiceController, PembayaranController};

Route::get('/', fn () => redirect()->route('pelanggan.index'));

Route::resource('pelanggan', PelangganController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('daftar-service', DaftarServiceController::class)
     ->parameters(['daftar-service' => 'daftarService']);
Route::resource('data-service', DataServiceController::class)
     ->parameters(['data-service' => 'dataService']);
Route::resource('pembayaran', PembayaranController::class);