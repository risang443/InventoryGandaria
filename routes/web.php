<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.dashboard');
});

Route::get('/output', function () {
    return view('layout.keluar');
});