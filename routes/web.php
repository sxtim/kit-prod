<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SalesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacts/', [ContactsController::class, 'index'])->name('contacts');

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'list'])->name('news-list');

    Route::get('/detail/{id}', [NewsController::class, 'detail'])->name('news-detail');
});

Route::prefix('sales')->group(function () {
    Route::get('/', [SalesController::class, 'list'])->name('sales-list');

    Route::get('/detail/{id}', [SalesController::class, 'detail'])->name('sales-detail');
});
