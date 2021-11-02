<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('pages.homepage');
})->name('home');

Route::get('/inner',function() {
    return view('pages.footerPage');
})->name('inner');
