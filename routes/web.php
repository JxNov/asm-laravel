<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Admin
use App\Http\Controllers\Admin\DashBoardController as AdminDashBoardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// Client
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ContactController as UserContactController;

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

//Route::get('/', function () {
//    return view('client.index');
//});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

    Route::prefix('password')->as('password.')->group(function () {
        Route::get('/forgot', [ForgotPasswordController::class, 'create'])->name('request');
        Route::post('/forgot', [ForgotPasswordController::class, 'store'])->name('email');

        Route::get('/reset', [ResetPasswordController::class, 'create'])->name('reset');
        Route::post('/reset', [ResetPasswordController::class, 'store'])->name('update');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::prefix('admin')->as('admin.')->middleware('isAdmin')->group(function () {
    Route::prefix('products')->as('products.')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
    });

    Route::get('/', [AdminDashBoardController::class, 'index'])->name('home');
});

// Client
Route::prefix('/')->group(function () {
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::post('/update', [UserHomeController::class, 'updateProfile'])->name('update');

        Route::get('/', [UserHomeController::class, 'profile'])->name('index');
    });

    Route::prefix('products')->as('products.')->group(function () {
        Route::get('/cart', [UserProductController::class, 'cart'])->name('cart');

        Route::get('/checkout', [UserProductController::class, 'checkout'])->name('checkout');

        Route::get('/{id}', [UserProductController::class, 'show'])->name('show');

        Route::get('/', [UserProductController::class, 'index'])->name('index');
    });

    Route::prefix('contact')->as('contact.')->group(function () {
        Route::get('/', [UserContactController::class, 'index'])->name('index');
    });

    Route::get('/', [UserHomeController::class, 'index'])->name('home');
});

// Fall back route
Route::fallback(function () {
    return "404 Not Found";
});
