<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route untuk halaman utama / home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk menampilkan produk berdasarkan kategori
Route::get('/products/category/{category}', [ProductController::class, 'filterByCategory'])->name('products.byCategory');

// Route untuk menampilkan produk berdasarkan harga (terendah atau tertinggi)
Route::get('/products/price/{price}', [ProductController::class, 'filterByPrice'])->name('products.byPrice');

// Route untuk menampilkan form pembuatan produk baru
Route::get('product/create', [ProductController::class, 'create'])->name('products.create');

// Route untuk menyimpan produk baru ke dalam database
Route::post('product/store', [ProductController::class, 'store'])->name('products.store');

// Route untuk halaman checkout
Route::get('/checkout', function () {
    return view('checkout');
});

// Route untuk halaman keranjang belanja
Route::get('/cart', function () {
    return view('cart');
});
