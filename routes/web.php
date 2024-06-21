<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Status;

Route::get('/', function () {
    return view('/landing-page/pages/Home/home');
});


// Landing page route for articles
Route::get('/article', [ArticleController::class, 'paginateArticles'])->name('paginate.articles');

// Landing page route for search
Route::get('/article/search', [ArticleController::class, 'searchArticles'])->name('search.articles');

// Landing page route for show
Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('landing.article.show');


// Dashboard routes for authenticated users with status middleware
Route::middleware(['auth', Status::class])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('article', ArticleController::class);
    Route::resource('galery', GaleryController::class);
    Route::resource('catalog', CatalogController::class);
});

Auth::routes();


