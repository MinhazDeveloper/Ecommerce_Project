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

    Route::prefix('product')->group(function () {
        // Admin
        Route::controller(AdminController::class)->group(function () {
            Route::get('/index', 'product')->name('product.index');
            Route::post('/store', 'productStore')->name('product.store');
            Route::get('/show', 'productShow')->name('product.show');
        });
        // User
        Route::controller(HomeController::class)->group(function () {
            Route::get('/details/{id}', 'productDetails')->name('product.details');
            Route::post('/add/cart/{id}', 'productAddCart')->name('product.add_cart');
            Route::get('/cart_show', 'cart_show')->name('product.cart_show');
            Route::delete('/remove_cart/{id}', 'remove_cart')->name('product.remove_cart');
        });

    });
    //order
    Route::get('/cash_order',[HomeController::class,'cash_order'])->name('cash_order');
    Route::get('/orders_show',[AdminController::class,'orders_show']);
    Route::get('/delivered/{id}',[AdminController::class,'delivered'])->name('delivered');
    Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf'])->name('print_pdf');

    //payment
    Route::get('/stripe/{totalprice}',[HomeController::class,'stripe'])->name('stripe');
    Route::post('/stripe',[HomeController::class,'stripePost'])->name('stripe.post');

});
