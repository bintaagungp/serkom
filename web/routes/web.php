<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DayaController;
use App\Http\Controllers\Admin\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/daya', [DayaController::class, 'index'])->name('admin.daya');
        Route::post('/daya', [DayaController::class, 'store'])->name('admin.daya.store');
        Route::get('/daya/{id}/edit', [DayaController::class, 'edit'])->name('admin.daya.edit');
        Route::put('/daya/{id}/update', [DayaController::class, 'update'])->name('admin.daya.update');
        Route::delete('/daya/{id}/delete', [DayaController::class, 'destroy'])->name('admin.daya.destroy');

        Route::get('/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan');
        Route::post('/pelanggan', [PelangganController::class, 'store'])->name('admin.pelanggan.store');
        Route::get('/pelanggan/{id}/show', [PelangganController::class, 'show'])->name('admin.pelanggan.show');
        Route::post('/pelanggan/{id}/listrik', [PelangganController::class, 'storeListrik'])->name('admin.pelanggan.storeListrik');
        Route::delete('/pelanggan/{id}/listrik/{listrik_id}/delete', [PelangganController::class, 'deleteListrik'])->name('admin.pelanggan.deleteListrik');
        Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('admin.pelanggan.edit');
        Route::put('/pelanggan/{id}/update', [PelangganController::class, 'update'])->name('admin.pelanggan.update');
        Route::delete('/pelanggan/{id}/delete', [PelangganController::class, 'destroy'])->name('admin.pelanggan.destroy');

        Route::get('/tagihan', [TagihanController::class, 'index'])->name('admin.tagihan');
        Route::post('/tagihan', [TagihanController::class, 'store'])->name('admin.tagihan.store');
        Route::get('/tagihan/{id}/edit', [TagihanController::class, 'edit'])->name('admin.tagihan.edit');
        Route::put('/tagihan/{id}/update', [TagihanController::class, 'update'])->name('admin.tagihan.update');
        Route::delete('/tagihan/{id}/delete', [TagihanController::class, 'destroy'])->name('admin.tagihan.destroy');
    });
});

require __DIR__.'/auth.php';
