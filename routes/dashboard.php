<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\WelcomeController;
use App\Http\Controllers\Dashboard\Auth\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\ResetPasswordController;

use Illuminate\Support\Facades\Route;

/********************
 * Web Routes
 ********************/

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'as' => 'dashboard.',
        'middleware' => ['localize', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath']
    ],
    function () {

        ####################################Auth Routes########################################################
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


        #######################################password routes###############################################

        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::get('/email', [ForgetPasswordController::class, 'showEmailForm'])->name('email');
            Route::post('/email', [ForgetPasswordController::class, 'sendOtp'])->name('sendOtp');
            Route::get('/verify/{email}', [ForgetPasswordController::class, 'showOtpForm'])->name('showOtpForm');
            Route::post('/verify', [ForgetPasswordController::class, 'verifyOtp'])->name('verifyOtp');
            Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
            Route::post('/reset', [ResetPasswordController::class, 'reset'])->name('reset.post');
        });

        ################################protected Routes########################################################
        Route::group(['middleware' => 'auth:admin'], function () {

            ################################welcome Route########################################################
            Route::get('welcome', [WelcomeController::class, 'index'])->name('welcome');
        });
        ################################end of protected Routes########################################################


    }
);
