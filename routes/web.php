<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class,'redirect']);
//category route
Route::get('/view_category',[AdminController::class,'view_category'])->name('category.view');
Route::post('/category_add',[AdminController::class,'category_add'])->name('category.add');
Route::get('/category/edit/{id}',[AdminController::class,'categoryEdit'])->name('category.edit');
Route::put('/category/update/{id}',[AdminController::class,'categoryUpdate'])->name('category.update');
Route::delete('/category/delete/{id}',[AdminController::class,'categoryDelete'])->name('category.delete');

//product route
Route::get('/product',[AdminController::class,'product'])->name('product');
Route::post('/product_store',[AdminController::class,'productStore'])->name('product.store');

