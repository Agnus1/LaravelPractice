<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ArticlesPageController;
use App\Http\Controllers\CatalogPageController;

Route::get('/', [HomePageController::class, 'homepage'])->name('home');
Route::get('/about',[PageController::class, 'about'])->name('about');
Route::get('/contactinfo', [PageController::class, 'contactinfo'])->name('contactinfo');
Route::get('/conditions', [PageController::class, 'conditions'])->name('conditions');
Route::get('/financial', [PageController::class, 'financial'])->name('financial');
Route::get('/forclients', [\App\Http\Controllers\ForClientsController::class, 'forClients'])->name('forclients');
Route::get('/salons', [PageController::class, 'salons'])->name('salons');

Route::resource('/articles', ArticlesPageController::class);
//Route::resource('/catalog', CatalogPageController::class);

Route::get('/products/{car}', [CatalogPageController::class, 'show'])->name('catalog.show');
Route::get('/catalog/{category}', [CatalogPageController::class, 'index'])->name('catalog.index');