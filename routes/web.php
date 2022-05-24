<?php

use App\Http\Controllers\{
    Auth\LoginController,
    DashboardController,
    ProfileController,
};
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\GameController;
=======
use App\Http\Controllers\GamesController;
>>>>>>> 6352fa3afadc44bdb03b512055cdf1c38cfb1df7

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', DashboardController::class)->name(name: 'dashboard');
Route::get('/login', LoginController::class)->name(name: 'login');
<<<<<<< HEAD
Route::get('/', DashboardController::class)->name(name: 'dashboard');
Route::get('/game/{game}/show', GameController::class)->name(name: 'show_game');
=======
Route::get('/profile', ProfileController::class)->name(name: 'profile');
Route::get('/games/{game}', GamesController::class)->name(name: 'games.show');
>>>>>>> 6352fa3afadc44bdb03b512055cdf1c38cfb1df7
