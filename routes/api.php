<?php

use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->name('api.products.')->group(function () {
    Route::get('/',          [ProductApiController::class, 'index'])->name('index');
    Route::get('/{product}', [ProductApiController::class, 'show'])->name('show');
});
