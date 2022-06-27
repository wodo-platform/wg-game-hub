<?php

namespace App\Http\Controllers\GameLobbies;

use App\Actions\Games\GameLobbies\AddUserToGameLobbyAction;
use App\Http\Controllers\Controller;
use Redirect;

class GameLobbyJoinController extends Controller
{
    public function __invoke(
        string $gameLobby,
        AddUserToGameLobbyAction $addUserToGameLobbyAction,
    ) {
        $gameLobby = $addUserToGameLobbyAction->execute(
            request: request(),
            gameLobbyID: $gameLobby,
        );
        return Redirect::route('game-lobbies.show', [
            'gameLobby' => $gameLobby,
        ]);
    }
}
