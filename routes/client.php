<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientController;



Route::prefix('client')->name('client.')->group(function () {

    Route::middleware(['guest:client', 'PreventBackHistory'])->group(function () {
        Route::controller(ClientController::class)->group(function () {
            Route::get('/login', 'login')->name('login');
            Route::post('/login-handler', 'loginHandler')->name('login-handler');
            Route::get('/register', 'register')->name('register');
            Route::post('/create', 'createClient')->name('create');
            Route::get('/account/verify/{token}', 'verifyAccount')->name('verify');
            Route::get('/register-success', 'registerSuccess')->name('register-success');
            Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
            Route::post('/send-password-reset-link', 'sendPasswordResetLink')->name('send-password-reset-link');
            Route::get('/password/reset/{token}', 'showResetForm')->name('reset-password');
            Route::post('/reset-password-handler', 'resetPasswordHandler')->name('reset-password-handler');
        });
    });

    Route::middleware(['auth:client', 'PreventBackHistory'])->group(function () {

        Route::controller(ClientController::class)->group(function () {
            Route::get('/', 'home')->name('home');
            Route::post('/logout', 'logoutHandler')->name('logout');
            Route::get('/profile', 'profileView')->name('profile');
            Route::post('/change-profile-picture', 'changeProfilePicture')->name('change-profile-picture');
            Route::post('/etablishment/{id}/comment', [ClientController::class, 'addComment'])->name('client.comment');
            Route::post('/comment/{id}/reply', [ClientController::class, 'replyToComment'])->name('client.reply');
        });
    });
});
