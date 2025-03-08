<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Phone;
use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'index', ['phones' => Phone::latest()->take(3)->get()]);

// Phones
Route::get('/phones', [PhoneController::class, 'index'])->name('phones');
Route::get('/phones/{phone}', [PhoneController::class, 'show'])->name('phones.show');


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
    Route::get('/profile', [UserController::class, 'edit'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'update']);

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{phone}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{phone}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store']);
    Route::get('/checkout/confirmation/{orderId}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
});


// Admin Dashboard (Only Admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::redirect('/admin', '/admin/dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/phones', [AdminController::class, 'phones'])->name('admin.phones.index');
    Route::get('/admin/phones/create', [AdminController::class, 'create_phone'])->name('admin.phones.create');
    Route::post('/admin/phones', [AdminController::class, 'store_phone']);
    Route::get('/admin/phones/{id}/edit', [AdminController::class, 'edit_phone'])->name('admin.phones.edit');
    Route::put('/admin/phones/{id}', [AdminController::class, 'update_phone']);
    Route::delete('/admin/phones/{id}', [AdminController::class, 'delete_phone']);

    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders.index');
    Route::get('/admin/orders/{order}/edit', [AdminController::class, 'edit_order']); 
    Route::put('/admin/orders/{order}', [AdminController::class, 'update_order']); 

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings.index');
});