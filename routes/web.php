<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ArticlesPageController;
use App\Http\Controllers\CreateArticleController;

Route::get('/', [HomePageController::class, 'homepage'])->name('home');
Route::get('/about',[PageController::class, 'about'])->name('about');
Route::get('/contactinfo', [PageController::class, 'contactinfo'])->name('contactinfo');
Route::get('/conditions', [PageController::class, 'conditions'])->name('conditions');
Route::get('/financial', [PageController::class, 'financial'])->name('financial');
Route::get('/forclients', [PageController::class, 'forclients'])->name('forclients');
Route::get('/salons', [PageController::class, 'salons'])->name('salons');
Route::get('/articles/create', [ArticlesPageController::class, 'create'])->name('create');
Route::post('/articles', [ArticlesPageController::class, 'store']);
Route::get('/articles/{article}', [ArticlesPageController::class, 'show'])->name('article');
Route::get('/articles', [ArticlesPageController::class, 'index'])->name('articles');
