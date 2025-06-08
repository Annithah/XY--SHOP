<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/index', function () {
//     return view(' products.index');
// })->middleware(['auth'])->name('index');

// Product resource routes
Route::resource('products', ProductController::class)->middleware(['auth']);

// Stock In/Out routes
Route::get('products/{id}/stockin', [ProductController::class, 'stockInForm'])->name('products.stockin')->middleware(['auth']);
Route::post('products/{id}/stockin', [ProductController::class, 'stockIn'])->middleware(['auth']);

Route::get('products/{id}/stockout', [ProductController::class, 'stockOutForm'])->name('products.stockout')->middleware(['auth']);
Route::post('products/{id}/stockout', [ProductController::class, 'stockOut'])->middleware(['auth']);

// Profile routes (editing user profile)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
