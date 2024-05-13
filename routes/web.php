<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuthMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('main', function () {
    return view('layouts/main');
});

Route::get('/mainpage', function () {
    return view('mainpage');
});

Route::get('/customerdetails', function () {
    return view('customerdetails');
});

Route::get('/cartdetails', function () {
    return view('cartdetails');
});

Route::get('/ordersuccess', function () {
    return view('ordersuccess');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/addproduct', function () {
    return view('addproduct');
});

Route::get('/mainpage', [ProductsController::class, 'index'])->name('mainpage');
Route::post('/addproduct', [ProductsController::class, 'store'])->name('addproduct.store');

// delete products
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
// for customer
Route::get('/customers',[CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');

// Admin Login Routes
Route::get('/adminlogin', [AdminController::class, 'index'])->name('adminlogin');
Route::post('/adminlogin', [AdminController::class, 'login']);
Route::get('/admin-logout', [AdminController::class, 'adminlogout'])->name('admin-logout');

// Admin Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/admindashboard', [AdminController::class, 'showProducts'])->name('admindashboard');
});
