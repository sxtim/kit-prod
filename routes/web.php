<?php

use App\Http\Controllers\AboutCompanyController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\BanksController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\JkController;
use App\Http\Controllers\JkOptionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UkController;
use Illuminate\Support\Facades\Route;

Route::prefix(trim((string) config('platform.prefix', '/admin'), '/'))
    ->middleware(config('platform.middleware.public', ['web']))
    ->group(function () {
        Route::get('/forgot-password', [PasswordResetController::class, 'request'])
            ->name('password.request');

        Route::post('/forgot-password', [PasswordResetController::class, 'email'])
            ->middleware('throttle:6,1')
            ->name('password.email');

        Route::get('/reset-password/{token}', [PasswordResetController::class, 'reset'])
            ->name('password.reset');

        Route::post('/reset-password', [PasswordResetController::class, 'update'])
            ->middleware('throttle:6,1')
            ->name('password.update');
    });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacts/', [ContactsController::class, 'index'])->name('contacts');
Route::get('/favorites/', [FavoritesController::class, 'index'])->name('favorites');
Route::get('/about-company/', [AboutCompanyController::class, 'index'])->name('about_company');
Route::get('/uk/', [UkController::class, 'index'])->name('uk');
Route::get('/credit/', [CreditController::class, 'index'])->name('credit');

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'list'])->name('news_list');

    Route::get('/detail/{item}', [NewsController::class, 'legacyDetail'])
        ->whereNumber('item')
        ->name('news_detail.legacy');
    Route::get('/{item:slug}', [NewsController::class, 'detail'])->name('news_detail');
});

Route::prefix('sales')->group(function () {
    Route::get('/', [SalesController::class, 'list'])->name('sales_list');

    Route::get('/detail/{item}', [SalesController::class, 'legacyDetail'])
        ->whereNumber('item')
        ->name('sales_detail.legacy');
    Route::get('/{item:slug}', [SalesController::class, 'detail'])->name('sales_detail');
});

Route::prefix('complex')->group(function () {
    Route::get('/', [JkController::class, 'list'])->name('jk_list');

    Route::get('/detail/{item}', [JkController::class, 'legacyDetail'])
        ->whereNumber('item')
        ->name('jk_detail.legacy');
    Route::get('/options/{option}', [JkOptionController::class, 'detail'])->name('jk_option_detail');
    Route::get('/{item:slug}', [JkController::class, 'detail'])->name('jk_detail');
});

Route::prefix('apartments')->group(function () {
    Route::get('/', [HouseController::class, 'list'])->name('house_list');

    Route::get('/detail/{house}', [HouseController::class, 'legacyDetail'])
        ->whereNumber('house')
        ->name('house_detail.legacy');
    Route::get('/{house}', [HouseController::class, 'detail'])->name('house_detail');
});

Route::prefix('commerce')->group(function () {
    Route::get('/', [CommerceController::class, 'list'])->name('commerce_list');

    Route::get('/detail/{item}', [CommerceController::class, 'legacyDetail'])
        ->whereNumber('item')
        ->name('commerce_detail.legacy');
    Route::get('/{item:slug}', [CommerceController::class, 'detail'])->name('commerce_detail');
});

Route::get('/bank/info/{bank}', [BanksController::class, 'detail'])->name('bank_detail');
Route::post('/api/contact', [FormController::class, 'index'])->name('form');

Route::get('/agreement/opd', fn () => view('pages.agreement_opd'))->name('agreement_opd');
Route::get('/agreement/ym', fn () => view('pages.agreement_ym'))->name('agreement_ym');
Route::get('/agreement/personal', fn () => view('pages.personal_agreement'))->name('agreement_personal');
