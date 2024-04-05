<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\MasukBarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('pages.auth.login');
});


Route::prefix('admin')
    ->middleware(['auth', 'auth.admin'])
    ->group(function () {
            Route::get('home', [DashboardController::class, 'index'])->name('admin.home');
            Route::resource('users', UserController::class);
            Route::resource('category', CategoryController::class);
            Route::resource('satuan', SatuanController::class);
            Route::resource('barang', BarangController::class);

            Route::resource('dashboard', DashboardController::class);

            Route::resource('kartu', KartuController::class);

            Route::resource('transaksi', TransaksiController::class);
            Route::resource('masukbarang', MasukBarangController::class);
            Route::resource('stock', StockController::class);
            Route::put('masukbarang', [MasukBarangController::class, 'proses'])->name('masukbarang.proses');
            Route::put('transaksi', [TransaksiController::class, 'proses'])->name('transaksi.proses');
            Route::delete('/transaksi/{id}', [TransaksiController::class, 'hapus'])->name('transaksi.hapus');
            Route::delete('/masukbarang/{id}', [TransaksiController::class, 'hapus'])->name('masukbarang.hapus');

            Route::get('/export/excel', [ExportController::class, 'exportToExcel'])->name('export.excel');

    });

    Route::prefix('user')
    ->middleware(['auth', 'auth.user'])
    ->group(function () {
        Route::get('home', [DashboardController::class, 'index'])->name('user.home');
    });



