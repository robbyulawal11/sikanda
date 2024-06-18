<?php

use Illuminate\Support\Facades\Route;

// Route::get('/article', function () {
//     return view('/dashboard/pages/Article/show');
// });

Route::get('/', function () {
    return view('/landing-page/layouts/app');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/article', [App\Http\Controllers\ArticleController::class, 'index'])->name('index');

Route::get('/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('create');

Route::post('/create', [App\Http\Controllers\ArticleController::class, 'store'])->name('store');

Route::get('/{article}/edit', [App\Http\Controllers\ArticleController::class, 'edit'])->name('edit');

Route::post('/{article}/update', [App\Http\Controllers\ArticleController::class, 'update'])->name('update');

Route::delete('/article/{article}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('delete');
