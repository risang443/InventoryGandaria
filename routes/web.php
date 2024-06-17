<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');

Route::middleware(['auth','superadmin'])->group(function () {
    Route::get('/formupdatebarang/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/formupdate/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/forminsert', [ProductController::class, 'store'])->name('product.store');
    Route::get('/forminsert', function () {
        return view('layout.databarang.formnewbarang');
    });
    Route::get('/tabelbarang', [ProductController::class,"index"])->name('product.index');
    Route::get('/export-products-pdf', [ProductController::class, 'exportPdf'])->name('export.products.pdf');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');
    Route::get('/stok',[TransactionController::class,"indextransaksi"] );
    Route::post('/add-stock', [TransactionController::class, 'addStock'])->name('addStock');
    Route::post('/reduce-stock', [TransactionController::class, 'reduceStock'])->name('reduceStock');

    Route::get('/opname', [OpnameController::class, 'index'])->name('opname.index');
    Route::get('/anomali/create', [OpnameController::class, 'create'])->name('anomali.create');
    Route::post('/anomali/store', [OpnameController::class, 'store'])->name('anomali.store');
   
    Route::get('/export/transactions/pdf', [TransactionController::class, 'exportPdf'])->name('export.transactions.pdf');
    Route::get('/export/anomalies/pdf', [OpnameController::class, 'exportPdf'])->name('export.anomalies.pdf');
    Route::get('/logout',[AuthController::class,'logout'])->name('keluar');
});


Route::get('/login',[AuthController::class, 'login'] )->name('view.login');
Route::post('/login', [AuthController::class, 'authenticate'] )->name('login');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
