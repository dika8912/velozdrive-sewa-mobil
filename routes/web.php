<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index']);
Route::view('/kendaraan', 'Kendaraan')->name('kendaraan');

// ── Guest routes ───────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/register',               [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',              [AuthController::class, 'register']);

    Route::get('/login',                  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',                 [AuthController::class, 'login']);

    Route::get('/forgot-password',        [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password',       [AuthController::class, 'forgotPassword'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password',        [AuthController::class, 'resetPassword'])->name('password.update');
});

// ── Auth routes ────────────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // ── User routes ────────────────────────────────────────────────────────────
    Route::middleware('role:user')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

        // Mobil
        Route::prefix('mobil')->name('user.mobil.')->group(function () {
            Route::get('/',        [MobilController::class, 'index'])->name('index');
            Route::get('/{id}',    [MobilController::class, 'show'])->name('show');
        });

        // Invoice
        Route::prefix('invoice')->name('user.invoice.')->group(function () {
            Route::get('/',        [InvoiceController::class, 'index'])->name('index');
            Route::get('/{id}',    [InvoiceController::class, 'show'])->name('show');
            Route::post('/store',  [InvoiceController::class, 'store'])->name('store');
            Route::patch('/{id}/cancel', [InvoiceController::class, 'cancel'])->name('cancel');
        });

        // Transaksi
        Route::prefix('transaksi')->name('user.transaksi.')->group(function () {
            Route::get('/',        [TransaksiController::class, 'index'])->name('index');
            Route::get('/{id}',    [TransaksiController::class, 'show'])->name('show');
            Route::post('/pay',    [TransaksiController::class, 'pay'])->name('pay');
        });

        // Profile
        Route::prefix('profile')->name('user.profile.')->group(function () {
            Route::get('/',        [ProfileController::class, 'index'])->name('index');
            Route::patch('/update',[ProfileController::class, 'update'])->name('update');
            Route::patch('/password', [ProfileController::class, 'updatePassword'])->name('password');
        });
    });

    // ── Admin routes ───────────────────────────────────────────────────────────
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Kelola Mobil
        Route::prefix('mobil')->name('mobil.')->group(function () {
            Route::get('/',            [App\Http\Controllers\MobilController::class, 'index'])->name('index');
            Route::get('/create',      [App\Http\Controllers\MobilController::class, 'create'])->name('create');
            Route::post('/store',      [App\Http\Controllers\MobilController::class, 'store'])->name('store');
            Route::get('/{id}/edit',   [App\Http\Controllers\MobilController::class, 'edit'])->name('edit');
            Route::patch('/{id}',      [App\Http\Controllers\MobilController::class, 'update'])->name('update');
            Route::delete('/{id}',     [App\Http\Controllers\MobilController::class, 'destroy'])->name('destroy');
        });

        // Kelola Invoice
        Route::prefix('invoice')->name('invoice.')->group(function () {
            Route::get('/',                    [App\Http\Controllers\InvoiceController::class, 'index'])->name('index');
            Route::get('/{id}',                [App\Http\Controllers\InvoiceController::class, 'show'])->name('show');
            Route::patch('/{id}/confirm',      [App\Http\Controllers\InvoiceController::class, 'confirm'])->name('confirm');
            Route::patch('/{id}/cancel',       [App\Http\Controllers\InvoiceController::class, 'cancel'])->name('cancel');
            Route::patch('/{id}/complete',     [App\Http\Controllers\InvoiceController::class, 'complete'])->name('complete');
        });

        // Kelola Transaksi
        Route::prefix('transaksi')->name('transaksi.')->group(function () {
            Route::get('/',            [App\Http\Controllers\TransaksiController::class, 'index'])->name('index');
            Route::get('/{id}',        [App\Http\Controllers\TransaksiController::class, 'show'])->name('show');
            Route::patch('/{id}/verify', [App\Http\Controllers\TransaksiController::class, 'verify'])->name('verify');
            Route::patch('/{id}/reject', [App\Http\Controllers\TransaksiController::class, 'reject'])->name('reject');
        });

        // Kelola User
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/',            [App\Http\Controllers\UserController::class, 'index'])->name('index');
            Route::get('/{id}',        [App\Http\Controllers\UserController::class, 'show'])->name('show');
            Route::patch('/{id}',      [App\Http\Controllers\UserController::class, 'update'])->name('update');
            Route::delete('/{id}',     [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
        });

        // Laporan
        Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/',            [App\Http\Controllers\LaporanController::class, 'index'])->name('index');
            Route::get('/export',      [App\Http\Controllers\LaporanController::class, 'export'])->name('export');
        });

        // Profile Admin
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/',            [ProfileController::class, 'index'])->name('index');
            Route::patch('/update',    [ProfileController::class, 'update'])->name('update');
            Route::patch('/password',  [ProfileController::class, 'updatePassword'])->name('password');
        });
    });
});