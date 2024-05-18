<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdmindashboardController;
use App\Http\Controllers\AuthController;



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
// order and orderdelete
Route::get('/orders', [OrderController::class, 'showOrder'])->name('orders.showOrder');
Route::get('/orders', [OrderController::class, 'showOrder'])->name('orders.showOrder');
Route::post('/orders/{id}/complete', [OrderController::class, 'markAsComplete'])->name('orders.complete');
Route::delete('/orders/{id}', [OrderController::class, 'deleteOrder'])->name('orders.delete');


Route::get('/mainpage', [ProductsController::class, 'index'])->name('mainpage');
Route::post('/addproduct', [ProductsController::class, 'store'])->name('addproduct.store');

// para sa order
Route::post('/mainpage', [OrderController::class, 'store'])->name('place-order');
Route::post('/placeaorder', [OrderController::class, 'placeOrder'])->name('placeorder');


// delete products and edit
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');


// for customer
Route::get('/customer',[CustomerController::class, 'index'])->name('customers.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/ordersuccess', [CustomerController::class, 'store'])->name('customers.store');

// Route to display the cart details form
Route::get('/cartdetails', [CartController::class, 'show'])->name('cartdetails.show');
Route::post('/cartdetails', [CartController::class, 'store'])->name('cartdetails.store');

// Admin Login Routes
Route::get('/adminlogin', [AdminController::class, 'index'])->name('adminlogin');
Route::post('/adminlogin', [AdminController::class, 'login']);
Route::get('/admin-logout', [AdminController::class, 'adminlogout'])->name('admin-logout');

// Admin Dashboard Route
Route::get('/adminlogin', [AdminController::class, 'index'])->name('adminlogin');
Route::post('/adminlogin', [AdminController::class, 'login'])->name('adminlogin');
// routes/web.php

Route::get('/logout', 'AuthController@logout')->name('logout');


Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::get('/admindashboard', [AdmindashboardController::class, 'admindashboard'])->name('admindashboard');
    Route::get('/adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout')->middleware('auth');
    

    
    // Add other admin-only routes here
});
