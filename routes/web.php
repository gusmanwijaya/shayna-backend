<?php

use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardContoller::class, 'index'])->name('dashboard');

Auth::routes(['register' => false]);

Route::get('products/{id}/gallery', [ProductController::class, 'gallery'])->name('products.gallery');
Route::get('transactions/{id}/set-status', [TransactionController::class, 'setStatus'])->name('transactions.status');

Route::resource('products', ProductController::class);
Route::resource('product-galleries', ProductGalleryController::class);
Route::resource('transactions', TransactionController::class);
