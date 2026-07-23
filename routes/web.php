<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoriEventController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ETicketController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('kategori', KategoriEventController::class);
Route::resource('event', EventController::class);
Route::resource('tiket', TiketController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('eticket', ETicketController::class);