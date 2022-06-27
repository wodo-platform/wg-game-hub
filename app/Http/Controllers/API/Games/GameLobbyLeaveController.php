<?php

namespace App\Http\Controllers\API\Games;

use App\Actions\Games\GameLobbies\AddUserToGameLobbyAction;
use App\Actions\Games\GameLobbies\RemoveUserFromGameLobbyAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameLobbyResource;
use Illuminate\Http\Request;

class GameLobbyLeaveController extends Controller
{
    public function __invoke(
        Request $request,
        string $gameLobby,
        RemoveUserFromGameLobbyAction $removeUserFromGameLobbyAction,
    ) {
        $removeUserFromGameLobbyAction->execute(
            request: $request,
            gameLobbyID: $gameLobby,
        );

        return response()->noContent();
    }
}
