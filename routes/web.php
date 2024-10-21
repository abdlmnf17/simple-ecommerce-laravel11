<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PurchaseHistoryController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('products', App\Http\Controllers\ProductController::class);
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/checkout', [CheckoutController::class, 'process'])->middleware('auth')->name('checkout.process');
Route::get('/checkout/confirm', [CheckoutController::class, 'showConfirmation'])->name('checkout.confirm');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('disclaimer');
Route::middleware('auth')->group(function () {
    Route::get('/purchase-history', [PurchaseHistoryController::class, 'index'])->name('purchase.history');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sales/print/{id}', [CheckoutController::class, 'print'])->name('sales.print');

require __DIR__ . '/auth.php';
