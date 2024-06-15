<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index'])->name('index');

Route::get('/create', [App\Http\Controllers\CatalogController::class, 'create'])->name('create');

Route::post('/create', [App\Http\Controllers\CatalogController::class, 'store'])->name('store');

Route::get('/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit'])->name('edit');

Route::post('/{catalog}/update', [App\Http\Controllers\CatalogController::class, 'update'])->name('update');

Route::delete('/catalog/{catalog}', [App\Http\Controllers\CatalogController::class, 'delete'])->name('delete');