<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TransactionController::class, 'index']);
Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');
Route::get('/formupdatebarang/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/formupdate/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/forminsert', [ProductController::class, 'store'])->name('product.store');
Route::get('/forminsert', function () {
    return view('layout.databarang.formnewbarang');
});
Route::get('/tabelbarang', [ProductController::class,"index"])->name('product.index');

Route::get('/stok',[TransactionController::class,"indextransaksi"] );
Route::post('/add-stock', [TransactionController::class, 'addStock'])->name('addStock');
Route::post('/reduce-stock', [TransactionController::class, 'reduceStock'])->name('reduceStock');

Route::get('/anomali', function () {
    return view('layout.stokbarang.anomalibarang');
});

Route::get('/stokmasukkeluar', function () {
    return view('layout.stokbarang.formkeluarmasukstok');
});


Route::get('/login', function () {
    return view('login.login');
});