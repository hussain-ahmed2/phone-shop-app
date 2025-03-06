<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'index');

// User Register and Login
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});


// User Dashboard (Only Authenticated Users)
Route::middleware(['auth'])->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

// Admin Dashboard (Only Admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::redirect('/admin', '/admin/dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/phones', [AdminController::class, 'phones'])->name('admin.phones.index');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings.index');
});