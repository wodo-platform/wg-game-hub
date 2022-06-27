<?php

namespace App\Http\Controllers\API\Games;

use App\Actions\Games\GameLobbies\AddUserToGameLobbyAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameLobbyResource;
use Illuminate\Http\Request;

class GameLobbyJoinController extends Controller
{
    public function __invoke(
        Request $request,
        string $gameLobby,
        AddUserToGameLobbyAction $addUserToGameLobbyAction,
    ) {
        $gameLobby = $addUserToGameLobbyAction->execute(
            request: $request,
            gameLobbyID: $gameLobby,
        );
        return new GameLobbyResource(resource: $gameLobby);
    }
}
