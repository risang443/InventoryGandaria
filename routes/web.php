<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.dashboard');
});

Route::get('/forminsert', function () {
    return view('layout.databarang.formnewbarang');
});

Route::get('/tabelbarang', function () {
    return view('layout.databarang.tabelbarang');
});

Route::get('/nambahstok', function () {
    return view('layout.stokbarang.ambilstokbarang');
});

Route::get('/kurangstok', function () {
    return view('layout.stokbarang.kurangstokbarang');
});

Route::get('/anomali', function () {
    return view('layout.stokbarang.anomalibarang');
});

Route::get('/login', function () {
    return view('login.login');
});