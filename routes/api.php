<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranController;

Route::apiResource('pelanggan', PelangganController::class)->names('api.pelanggan');
Route::apiResource('kendaraan', KendaraanController::class)->names('api.kendaraan');
Route::apiResource('daftar-service', DaftarServiceController::class)
    ->parameters(['daftar-service' => 'daftarService'])->names('api.daftar-service');
Route::apiResource('data-service', DataServiceController::class)
    ->parameters(['data-service' => 'dataService'])->names('api.data-service');
Route::apiResource('pembayaran', PembayaranController::class)->names('api.pembayaran');
