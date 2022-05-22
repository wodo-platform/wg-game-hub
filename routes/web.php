<?php

use App\Http\Controllers\{
    Auth\LoginController,
    DashboardController,
    ProfileController,
};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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


Route::get('/login', LoginController::class)->name(name: 'login');
Route::get('/profile', ProfileController::class)->name(name: 'profile');
Route::get('/game/{game}/show', GameController::class)->name(name: 'show_game');
Route::get('/', DashboardController::class)->name(name: 'dashboard');