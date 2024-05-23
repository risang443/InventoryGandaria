<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::apiResource('products', ProductController::class);
Route::apiResource('transactions', TransactionController::class);
