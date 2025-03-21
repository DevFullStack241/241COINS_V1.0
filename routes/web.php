<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/landing', [HomeController::class, 'landing'])->name('landing');
Route::get('/apropos', [HomeController::class, 'apropos'])->name('apropos');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/etablissement', [HomeController::class, 'etablissement'])->name('etablissement');
Route::get('/etablissements/{id}', [HomeController::class, 'detail'])->name('etablishment.detail');
Route::post('/etablishment/{id}/like', [LikeController::class, 'toggleLike'])->name('client.like');
