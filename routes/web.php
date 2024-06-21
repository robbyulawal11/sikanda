<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Status;
use App\Http\Controllers\HomeController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/katalog', [App\Http\Controllers\HomeController::class, 'detail_catalog'])->name('detail_catalog');

Route::middleware(['auth', Status::class])->prefix('/')->group(function () {
    Route::resource('galery', GaleryController::class);
    Route::resource('catalog', CatalogController::class);
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
