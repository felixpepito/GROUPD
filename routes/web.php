<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/asd', function () {
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

