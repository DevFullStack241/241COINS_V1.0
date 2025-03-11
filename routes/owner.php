<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\OwnerController;
use App\Http\Controllers\owner\CategorieController;
use App\Http\Controllers\owner\EtablishmentController;
use App\Http\Controllers\owner\ReviewController;



Route::prefix('owner')->name('owner.')->group(function () {

    Route::middleware(['guest:owner', 'PreventBackHistory'])->group(function () {
        Route::controller(OwnerController::class)->group(function () {
            Route::get('/login', 'login')->name('login');
            Route::post('/login-handler', 'loginHandler')->name('login-handler');
            Route::get('/register', 'register')->name('register');
            Route::post('/create', 'createOwner')->name('create');
            Route::get('/account/verify/{token}', 'verifyAccount')->name('verify');
            Route::get('/register-success', 'registerSuccess')->name('register-success');
            Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
            Route::post('/send-password-reset-link', 'sendPasswordResetLink')->name('send-password-reset-link');
            Route::get('/password/reset/{token}', 'showResetForm')->name('reset-password');
            Route::post('/reset-password-handler', 'resetPasswordHandler')->name('reset-password-handler');
        });
    });

    Route::middleware(['auth:owner', 'PreventBackHistory'])->group(function () {

        Route::controller(OwnerController::class)->group(function () {
            Route::get('/', 'home')->name('home');
            Route::post('/logout', 'logoutHandler')->name('logout');
            Route::get('/profile', 'profileView')->name('profile');
            Route::post('/change-profile-picture', 'changeProfilePicture')->name('change-profile-picture');
            Route::post('/comment/{id}/owner-reply', 'replyToComment')->name('owner.reply');
        });


        //CATEGORIES ROUTES
        Route::prefix('categorie')->name('categorie.')->group(function () {

            Route::controller(CategorieController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });

        //ETABLISSEMENTS ROUTES
        Route::prefix('etablishment')->name('etablishment.')->group(function () {

            Route::controller(EtablishmentController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });

        //AVIS ROUTES
        Route::prefix('avis')->name('avis.')->group(function () {

            Route::controller(ReviewController::class)->group(function () {
                Route::get('/index', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::put('/update/{id}', 'update')->name('update');
                Route::delete('/delete/{id}', 'destroy')->name('delete');
            });
        });
    });
});
