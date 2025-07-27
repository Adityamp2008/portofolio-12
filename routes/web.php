<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\informasiController;
use App\Http\Controllers\Admin\projectController;
use App\Http\Controllers\Admin\skillController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Models\Informasi;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);

Route::get('/login', [LoginController::class, 'formlogin'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');


Route::get('/dashboard', function () {
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//uji coba bang
    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/informasi',informasiController::class);
    Route::resource('/admin/project',projectController::class);
    Route::resource('/admin/skill',skillController::class);


Route::middleware('auth')->group(function () {
    
});

require __DIR__.'/auth.php';

