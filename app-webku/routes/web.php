<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('beranda', function () {
    return view('beranda');
});

Route::get('gempas', function () {
    return view('gempas');
});