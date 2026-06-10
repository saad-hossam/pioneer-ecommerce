<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\WelcomeController;
use Illuminate\Support\Facades\Route;

/********************
 * Web Routes
 ********************/

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localize', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath']
    ],
    function () {

####################################Auth Routes########################################################
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');

################################protected Routes########################################################
        Route::group(['middleware' => 'auth:admin'], function () {

################################welcome Route########################################################
        Route::get('welcome',[WelcomeController::class,'index'])->name('welcome');



    });
});
