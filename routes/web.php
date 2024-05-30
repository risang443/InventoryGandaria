<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.dashboard');
});

Route::get('/forminsert', function () {
    return view('layout.formnewbarang');
});

Route::get('/tabelbarang', function () {
    return view('layout.tabelbarang');
});

Route::get('/login', function () {
    return view('login.login');
});