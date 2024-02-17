<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StripeController;

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
    return view('login');
    
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class,'register'])->name('register');
    Route::post('/register', [AuthController::class,'registerPost'])->name('register');
    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::post('/login', [AuthController::class,'loginPost'])->name('login');
});


Route::group(['middleware' => 'auth'], function() {
    // Route::get('/home', [HomeController::class,'index']);
    Route::get('/home', [BookController::class,'index']);
    Route::get('/book/{id}', [BookController::class,'addBooktoCart'])->name('addbook.to.cart');
    Route::get('/shopping-cart', [BookController::class,'bookCart'])->name('shopping.cart');
    Route::delete('/delete-cart-product', [BookController::class,'deleteProduct'])->name('delete.cart.product');
    Route::patch('update-cart', [BookController::class, 'updateCart'])->name('update_cart');
Route::delete('remove-from-cart', [BookController::class, 'remove'])->name('remove_from_cart');

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');

    Route::delete('/logout', [AuthController::class,'logout'])->name('logout');
});

// Route::get('/book', [BookController::class,'index']);