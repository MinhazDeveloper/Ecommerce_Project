<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Public route
Route::get('/', [HomeController::class, 'index']);

// Protected routes (login + verified)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Redirect after login
    Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');

    // Category routes
    Route::prefix('category')->controller(AdminController::class)->group(function () {
        Route::get('/view', 'view_category')->name('category.view');
        Route::post('/add', 'category_add')->name('category.add');
        Route::get('/edit/{id}', 'categoryEdit')->name('category.edit');
        Route::put('/update/{id}', 'categoryUpdate')->name('category.update');
        Route::delete('/delete/{id}', 'categoryDelete')->name('category.delete');
    });

    // Product routes
    Route::prefix('product')->controller(AdminController::class)->group(function () {
        Route::get('/index', 'product')->name('product');
        Route::post('/store', 'productStore')->name('product.store');
        Route::get('/show', 'productShow')->name('product.show');
    });

});
