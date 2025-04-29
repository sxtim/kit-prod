<?php

use App\Http\Controllers\AboutCompanyController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\JkController;
use App\Http\Controllers\UkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SalesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacts/', [ContactsController::class, 'index'])->name('contacts');
Route::get('/favorites/', [FavoritesController::class, 'index'])->name('favorites');
Route::get('/about-company/', [AboutCompanyController::class, 'index'])->name('about_company');
Route::get('/uk/', [UkController::class, 'index'])->name('uk');
Route::get('/credit/', [CreditController::class, 'index'])->name('credit');

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'list'])->name('news_list');

    Route::get('/detail/{id}', [NewsController::class, 'detail'])->name('news_detail');
});

Route::prefix('sales')->group(function () {
    Route::get('/', [SalesController::class, 'list'])->name('sales_list');

    Route::get('/detail/{id}', [SalesController::class, 'detail'])->name('sales_detail');
});

Route::prefix('complex')->group(function () {
    Route::get('/', [JkController::class, 'list'])->name('jk_list');

    Route::get('/detail/{id}', [JkController::class, 'detail'])->name('jk_detail');
});

Route::prefix('apartments')->group(function () {
    Route::get('/', [HouseController::class, 'list'])->name('house_list');

    Route::get('/detail/{id}', [HouseController::class, 'detail'])->name('house_detail');
});
