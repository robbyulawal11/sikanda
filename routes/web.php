<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Status;
use App\Http\Controllers\HomeController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/catalog', [App\Http\Controllers\HomeController::class, 'detail_catalog'])->name('detail_catalog');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/visimisi', [App\Http\Controllers\HomeController::class, 'visimisi'])->name('visimisi');
Route::get('/sejarah', [App\Http\Controllers\HomeController::class, 'sejarah'])->name('sejarah');
Route::get('/geografis', [App\Http\Controllers\HomeController::class, 'geografis'])->name('geografis');
Route::get('/demografis', [App\Http\Controllers\HomeController::class, 'demografis'])->name('demografis');

// Landing page route for articles
Route::get('/article', [ArticleController::class, 'paginateArticles'])->name('paginate.articles');

// Landing page route for search
Route::get('/article/search', [ArticleController::class, 'searchArticles'])->name('search.articles');

// Landing page route for show
Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('landing.article.show');

// cek email
Route::post('/check-email', [UserController::class, 'checkEmail'])->name('check.email');

// Landing page route for articles
Route::get('/gallery', [GalleryController::class, 'paginateGalleries'])->name('paginate.galleries');

// Landing page route for show
Route::get('/gallery/show/{id}', [GalleryController::class, 'show'])->name('landing.gallery.show');


// Dashboard routes for authenticated users with status middleware
Route::middleware(['auth', Status::class])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user/setting-profile', [App\Http\Controllers\UserController::class, 'settingProfile'])->name('setting.profile');
    Route::put('/user/setting-profile/{user}', [App\Http\Controllers\UserController::class, 'updateSetting'])->name('update.profile');
    Route::resource('article', ArticleController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('catalog', CatalogController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
});

Auth::routes();


