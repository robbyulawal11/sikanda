<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Status;

Route::get('/', function () {
    return view('/landing-page/layouts/app');
});

Route::middleware(['auth', Status::class])->prefix('/')->group(function () {
    Route::resource('galery', GaleryController::class);
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
