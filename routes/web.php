<?php

use App\Http\Controllers\{
    Auth\LoginController,
    DashboardController,
    ProfileController,
};
use Illuminate\Support\Facades\Route;

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
Route::get('/', DashboardController::class)->name(name: 'dashboard');
Route::get('/profile', ProfileController::class)->name(name: 'profile');
