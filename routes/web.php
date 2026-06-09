<?php

use Illuminate\Support\Facades\Route;

/********************
 * Web Routes
 ********************/

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localize', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', function () {
            return view('dashboard.welcome');
        });

    }
);
