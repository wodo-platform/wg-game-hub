<?php

use App\Http\Controllers\{
    GamesController,
    ChatRoom\ChatRoomMessageController,
    DashboardController,
    GameLounges\GameLoungeJoinController,
    GameLounges\GameLoungeLeaveController,
    GameLounges\GameLoungeChatMessageController,
    GameLounges\GameLoungesController,
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

Route::get('/dashboard', DashboardController::class)->name(name: 'dashboard');
Route::resource('games', GamesController::class)->only('show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', ProfileController::class)
        ->middleware('auth')
        ->name(name: 'profile');

    Route::resource('games.game-lounges', GameLoungesController::class)
        ->parameters(['game-lounges' => 'gameLounge'])
        ->shallow()
        ->only('show');

    // GameLounges
    Route::post(
        'game-lounges/{gameLounge}/join',
        GameLoungeJoinController::class,
    )->name('game-lounges.join');

    Route::delete(
        'game-lounges/{gameLounge}/leave',
        GameLoungeLeaveController::class,
    )->name('game-lounges.leave');

    // Chat Rooms
    Route::post(
        'chat/{chatRoom}/message',
        ChatRoomMessageController::class,
    )->name('chat-room.message');
});
