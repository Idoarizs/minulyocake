<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginAuth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;

// Public Routes
Route::get('/', [ProductController::class, 'index'])->name('index');
Route::post('/login', [LoginAuth::class, 'login']);
Route::post('/logout', [LoginAuth::class, 'logout'])->name('logout');
Route::get('/products/{product}/details', [AdminController::class, 'show'])->name('products.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [AdminController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminController::class, 'create'])->name('products.create');
    Route::get('/products/{product}/edit', [AdminController::class, 'edit'])->name('products.edit');
    Route::post('/products', [AdminController::class, 'store'])->name('products.store');
    Route::put('/products/{product}', [AdminController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminController::class, 'destroy'])->name('products.destroy');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginAuth::class, 'showLoginForm'])->name('login');
});