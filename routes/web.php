<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


route::get('/', [HomeController:: class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('redirect', [HomeController:: class, 'redirect']);

route::get('/view_category', [AdminController:: class, 'view_category']);
route::post('/add_category', [AdminController::class, 'add_category']);
route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
route::get('/view_products', [AdminController::class, 'view_products']);
route::post('/add_products', [AdminController::class, 'add_products']);
route::get('/show_products', [AdminController::class, 'show_products']);
route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
route::get('/update_product/{id}', [AdminController::class, 'update_product']); 
route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);
route::get('/order', [AdminController::class, 'order']);

route::get('/product_details/{id}', [HomeController::class, 'product_details']);
route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
route::get('/show_cart', [HomeController::class, 'show_cart']);
route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
route::get('/cash_pay', [HomeController::class, 'cash_pay']);
route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);
Route::post('/stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');
