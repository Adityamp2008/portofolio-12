<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\informasiController;
use App\Http\Controllers\Admin\projectController;
use App\Http\Controllers\Admin\skillController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);

Route::get('/login', [LoginController::class, 'formLogin'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/informasi', informasiController::class);
    Route::resource('/admin/project', projectController::class);
    Route::resource('/admin/skill', skillController::class);
});

// require __DIR__.'/auth.php'; // <--- matikan kalau tidak pakai breeze route default
