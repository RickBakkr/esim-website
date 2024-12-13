<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\SetLocaleMiddleware;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/sitemap.php';

Route::group(['prefix' => '{locale?}', 'middleware' => SetLocaleMiddleware::class], function () {
    // home
    Route::get('/', [WebsiteController::class, 'index'])->name('home');

    // supported devices
    Route::get('/supported-devices', [WebsiteController::class, 'supportedDevices'])->name('supported-devices');

    // all destinations
    Route::get('/destinations', [WebsiteController::class, 'destinations'])->name('destinations');

    // about page
    Route::get('/about', [WebsiteController::class, 'about'])->name('about');

    // currency switcher
    Route::get('/currency/{currency}', [CurrencyController::class, 'setCurrencySession'])->name('set-currency');

    // fallback is needed
    Route::get('/{countryCode}-{slug?}', [WebsiteController::class, 'country'])->name('esim-bundle-per-country');
});
