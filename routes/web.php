<?php

use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Landing page
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// Public products page (guest layout)
Route::get('/products', function () {
    return Inertia::render('Products/PublicIndex');
})->name('products.public');

// Breeze auth routes
require __DIR__ . '/auth.php';

// Authenticated dashboard
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Profile (Breeze default)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin CRUD routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('suppliers',   SupplierController::class)->except(['show']);
    Route::resource('products',    ProductController::class)->except(['show']);
    Route::resource('inventories', InventoryController::class)->only(['index', 'edit', 'update']);
});
