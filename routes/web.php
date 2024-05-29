<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.dashboard');
});

Route::get('/output', function () {
    return view('layout.keluar');
});

Route::get('/tabelbarang', function () {
    return view('layout.tabelbarang');
});

Route::get('/login', function () {
    return view('login.login');
});