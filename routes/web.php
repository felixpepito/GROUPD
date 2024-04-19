<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;




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


Route::get('/', function () {
    return view('welcome');
});

Route::get('main', function () {
    return view(' layouts/main');
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


Route::get('/admin', function () {
    return view('admin');
});

Route::get('/mainpage', [productsController::class, 'index'])->name('mainpage');

