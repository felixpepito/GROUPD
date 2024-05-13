<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

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

Route::get('/adminlogin', function () {
    return view('adminlogin');
});

Route::get('/home', function () {
    return view('home');
});

Route::post('/admindashboard', function () {
    return view('admindashboard');
});

Route::get('/addproduct', function () {
    return view('addproduct');
});

Route::get('/mainpage', [ProductsController::class, 'index'])->name('mainpage');
Route::post('/addproduct', [ProductsController::class, 'store'])->name('addproduct.store');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');

// Admin Login Routes
Route::get('/adminlogin', [AdminController::class, 'showLoginForm'])->name('adminlogin');
Route::post('/adminlogin', [AdminController::class, 'login'])->name('adminlogin.submit');
Route::post('/adminlogout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admindashboard', [DashboardController::class, 'post'])->name('admindashboard')->middleware('admin');
