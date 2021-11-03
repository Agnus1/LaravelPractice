<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('pages.homepage');
})->name('home');

Route::get('/about',function() {
    return view('pages.about', ['title'=>'О нас']);
})->name('about');

Route::get('/contactinfo', function () {
    return view('pages.about', ['title'=>'Контактная информация']);
})->name('contactinfo');

Route::get('/conditions', function () {
    return view('pages.about', ['title'=>'Условия продаж']);
})->name('conditions');

Route::get('/financial', function () {
    return view('pages.about', ['title'=>'Финансовый отдел']);
})->name('financial');

Route::get('/forclients', function () {
    return view('pages.about', ['title'=>'Для клиентов']);
})->name('forclients');

Route::get('/salons', function () {
    return view('pages.salons', ['title'=>'Салоны']);
})->name('salons');

Route::get('/article', function () {
    return view('pages.article', ['title'=>'Машина']);
})->name('article');
