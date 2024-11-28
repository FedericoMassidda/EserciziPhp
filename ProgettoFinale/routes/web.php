<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WorkWithUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrailerController;




use App\Http\Controllers\GoogleLoginController;





// resource controller in cui è stata esclusa la rotta 'index', che viene gestita separatamente, ma sempre all'interno del controller ArticleController
Route::resource('articles', ArticleController::class)->except('index');
Route::get('/', [ArticleController::class, 'index'])->name('article.index');

// rotta vista shop
Route::get('/shop', [PageController::class, 'shop'])->name('articles.shop');

// rotta vista area personale
Route::get('/personal-area', [PageController::class, 'personalArea'])->name('personalArea');

// routes categories filter
Route::get('/articles/category/{category}', [PageController::class, 'filterByCategory'])->name('articles.filterByCategory');
// Route::get('/articles/category/{category}', [PageController::class, 'filterByCategory'])->name('articles.filterByCategory');


// routes work with us + mailtrap
Route::get('/workwithus', [WorkWithUsController::class, 'workwithus'])->name('workwithus');
Route::post('/workwithus', [WorkWithUsController::class, 'submitapplication'])->name('submit_application');
Route::post('/register', [RegisterController::class, 'submitapplication'])->name('register');

// route reserved area
Route::get('/reserved/index', [RevisorController::class, 'index'])->name('revisor.index');
Route::patch('accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::patch('cancel', [RevisorController::class, 'cancel'])->name('cancel');

//rotta per effettuare la ricerca 
Route::get('/search/article', [PageController::class, 'searchArticles']) ->name('article.search');

//rotta per la lingua
Route::post('/lingua/{lang})', [PageController::class, 'setLanguage'])->name('setLocale');

//rotta per google

Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
