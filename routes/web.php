<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyOrdersController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);
Route::resource('users',UserController::class);
Route::get('/orders', [MyOrdersController::class, 'index'])->name('orders.index');
Route::patch('/orders/{order}/cancel', [MyOrdersController::class, 'cancel'])->name('orders.cancel');
