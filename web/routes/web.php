<?php

use App\Http\Controllers\ProfileController  as UserProfileController;
use App\Http\Controllers\TagihanController as UserTagihanController;
use App\Http\Controllers\ListrikController as UserListrikController;
use App\Http\Controllers\Admin\DayaController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\TagihanController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->get('/dashboard', function () {
        return redirect()->route('listrik');
    })->name('dashboard');

    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tagihan', [UserTagihanController::class, 'index'])->name('tagihan');
    Route::post('/tagihan', [UserTagihanController::class, 'store'])->name('tagihan.store');
    Route::get('/tagihan/{id}/show', [UserTagihanController::class, 'show'])->name('tagihan.show');
    Route::get('/tagihan/{id}/edit', [UserTagihanController::class, 'edit'])->name('tagihan.edit');
    Route::put('/tagihan/{id}/update', [UserTagihanController::class, 'update'])->name('tagihan.update');
    Route::delete('/tagihan/{id}/delete', [UserTagihanController::class, 'destroy'])->name('tagihan.destroy');

    Route::get('/listrik', [UserListrikController::class, 'index'])->name('listrik');
    Route::post('/listrik', [UserListrikController::class, 'store'])->name('listrik.store');
    Route::get('/listrik/{id}/show', [UserListrikController::class, 'show'])->name('listrik.show');
    Route::get('/listrik/{id}/edit', [UserListrikController::class, 'edit'])->name('listrik.edit');
    Route::put('/listrik/{id}/update', [UserListrikController::class, 'update'])->name('listrik.update');
    Route::delete('/listrik/{id}/delete', [UserListrikController::class, 'destroy'])->name('listrik.destroy');

    Route::middleware([IsAdminMiddleware::class])->prefix('admin')->group(function () {
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
        Route::get('/tagihan/{id}/show', [TagihanController::class, 'show'])->name('admin.tagihan.show');
        Route::post('/tagihan/{id}/penggunaan', [TagihanController::class, 'store'])->name('admin.tagihan.store');
        Route::delete('/tagihan/{id}/penggunaan/{penggunaan_id}', [TagihanController::class, 'destroyPenggunaan'])->name('admin.tagihan.destroyPenggunaan');
        Route::get('/tagihan/{id}/edit', [TagihanController::class, 'edit'])->name('admin.tagihan.edit');
        Route::put('/tagihan/{id}/update', [TagihanController::class, 'update'])->name('admin.tagihan.update');
        Route::delete('/tagihan/{id}/delete', [TagihanController::class, 'destroy'])->name('admin.tagihan.destroy');
    });
});

require __DIR__.'/auth.php';
