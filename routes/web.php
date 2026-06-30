<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ListProdukController;


Route::get('/', function () {
    return view('welcome'); // atau view lain yang sudah kamu buat
});


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/users', function () {
        return 'Admin Users';
    });
});

Route::get('/image', function () {
    return view('image');
});

Route::get('/barang', [BarangController::class, 'tampilkan']);
Route::get('/customer', [CustomerController::class, 'tampilkan']);
Route::get('/order', [OrderController::class, 'tampilkan']);
Route::get('/product', [ProductController::class, 'tampilkan']);
Route::get('/listproduk', [ListProdukController::class, 'show']);
Route::get('/listproduk/{id}/edit', [ListProdukController::class, 'edit'])->name('produk.edit');
Route::put('/listproduk/{id}', [ListProdukController::class, 'update'])->name('produk.update');
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');
Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');
?>
