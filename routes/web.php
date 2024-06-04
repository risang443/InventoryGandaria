<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.dashboard');
});
Route::get('/formupdatebarang/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/formupdate/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/forminsert', [ProductController::class, 'store'])->name('product.store');
Route::get('/forminsert', function () {
    return view('layout.databarang.formnewbarang');
});
Route::get('/tabelbarang', [ProductController::class,"index"]);

Route::get('/nambahstok', function () {
    return view('layout.stokbarang.ambilstokbarang');
});

Route::get('/kurangstok', function () {
    return view('layout.stokbarang.kurangstokbarang');
});

Route::get('/anomali', function () {
    return view('layout.stokbarang.anomalibarang');
});

Route::get('/stokmasukkeluar', function () {
    return view('layout.stokbarang.formkeluarmasukstok');
});


Route::get('/login', function () {
    return view('login.login');
});