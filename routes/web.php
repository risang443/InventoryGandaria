<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InputBarangController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\OutputBarangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
Route::get('/', function () {
    return view('login.login');
});
Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');

Route::middleware(['auth','superadmin'])->group(function () {
    Route::get('/formupdatebarang/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/formupdate/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/forminsert', [ProductController::class, 'store'])->name('product.store');
    Route::get('/forminsert', [ProductController::class, 'create']);
    Route::get('/tabelbarang', [ProductController::class,"index"])->name('product.index');
    Route::get('/export-products-pdf', [ProductController::class, 'exportPdf'])->name('export.products.pdf');
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TransactionController::class, 'index'])->name('dashboard');
    Route::get('/stok',[TransactionController::class,"indextransaksi"] );
    Route::post('/add-stock', [TransactionController::class, 'addStock'])->name('addStock');
    Route::post('/reduce-stock', [TransactionController::class, 'reduceStock'])->name('reduceStock');
    Route::get('/inputbarang', [InputBarangController::class, 'index'])->name('input-barang.index');
    Route::get('/input-barang/create', [InputBarangController::class, 'create'])->name('input-barang.create');
    Route::post('/input-barang', [InputBarangController::class, 'store'])->name('input-barang.store');
    Route::get('/outputbarang', [OutputBarangController::class, 'index'])->name('output-barang.index');
    Route::get('/output-barang/create', [OutputBarangController::class, 'create'])->name('output-barang.create');
    Route::post('/output-barang', [OutputBarangController::class, 'store'])->name('output-barang.store');
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
